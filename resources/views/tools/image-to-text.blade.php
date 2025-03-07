<x-app-layout>
    <x-slot name="meta">
        <title>Image to text</title>
        <meta name="description" content="">
        <meta name="Publisher" content="www.myconvertertool.com">
        <meta property="og:title" content="">
        <meta property="og:type" content="Landing page">
        <meta name="twitter:title" content="">

        <meta property="og:image" content="https://www.myconvertertool.com/images/logo.png">
        <meta property="og:site_name" content="www.myconvertertool.com">
        <meta property="og:description" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="https://www.myconvertertool.com/images/logo.png">

        <link
            rel="stylesheet"
            href="/css/jquery.dataTables.min.css" />
        <link
            rel="stylesheet"
            href="/css/buttons.dataTables.min.css" />
        <link href="/css/imgtotxt.css" rel="stylesheet" />
    </x-slot>
    <x-slot name="alternate">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if(trim($localeCode) == 'en')
        <link rel="alternate" hreflang="x-default" href="https://www.myconvertertool.com/image-to-text" />
        <link rel="alternate" hreflang="{{ $localeCode }}" href="https://www.myconvertertool.com/image-to-text" />
        @else
        <link rel="alternate" hreflang="{{$localeCode }}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated($localeCode,'routes.png-jpg-convert')}}" />
        @endif
        @endforeach
    </x-slot>
    <div class="container mx-auto pt-5 max-w-[1232px]">
        <h1 class="text-center font-semibold text-[35px]">Image to text Converter</h1>
    </div>
    <div class="w-full justify-center items-center gap-4 rounded-md my-12">
        <imgtotxt-component />
    </div>
</x-app-layout>
<!-- JavaScript libraries and scripts -->
 <script>let worker = Tesseract.createWorker();
async function initializeWorker() {
  await worker.load();
  await worker.loadLanguage('eng');
  await worker.initialize('eng');
}

async function recognizeImage(image) {
  await initializeWorker();
  const { data: { text } } = await worker.recognize(image);
  return text;
}
</script>
<script src="/js/jquery-3.6.0.min.js"></script>
<script
    src="/js/tesseract.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
    $(document).ready(function() {
        const table = $("#results-table").DataTable({
            dom: "Bfrtip",
            buttons: [{
                extend: "csvHtml5",
                text: "Download CSV",
                title: "OCR Results",
                charset: "utf-8",
                bom: true,
                exportOptions: {
                    format: {
                        body: function(data, row, column, node) {
                            return data;
                        },
                    },
                },
            }, ],
        });

        let filesToProcess = [];

        document.addEventListener("paste", function(event) {
            const clipboardItems = event.clipboardData.items;
            for (let i = 0; i < clipboardItems.length; i++) {
                const item = clipboardItems[i];
                if (item.type.startsWith("image/")) {
                    const file = item.getAsFile();
                    if (file) {
                        filesToProcess.push(file);
                        displayFiles([]);
                    }
                }
            }
        });

        function displayFiles(files) {
            const newFiles = Array.from(files);
            filesToProcess = [...filesToProcess, ...newFiles];

            const fileCount = filesToProcess.length;
            $("#file-list").empty();
            const fileListHtml = filesToProcess
                .map((file, index) => {
                    const fileName = file.name;
                    const nameWithoutExt = fileName.substring(0, fileName.lastIndexOf(".")) || fileName;
                    const extension = fileName.slice(fileName.lastIndexOf("."));
                    const truncatedName = nameWithoutExt.length > 6 ? nameWithoutExt.substring(0, 3) + "..." + nameWithoutExt.slice(-3) : nameWithoutExt;
                    const preview = file.type.startsWith("image/") ?
                        `<img class="img-preview w-32 h-32 object-cover rounded-lg cursor-pointer shadow-md hover:scale-105 transition" src="${URL.createObjectURL(file)}" alt="${file.name}" style="height: 50px; width: 100px; margin-right: 10px;" title="Preview" />` :
                        "";
                    return `
                        <li data-index="${index}">
                            <p>${preview} ${truncatedName}${extension}</p>
                            <span>uploaded</span>
                            <div class="flex gap-2">
                                <img src="/images/crop.svg" class="crop-img cursor-pointer h-[20px]" height="20px" title="Crop">
                                <button class="btn remove-btn" data-index="${index}" style="margin-left: 10px;" title="Delete">
                                    <img src="/images/cross.svg" class="h-[20px]" height="20px">
                                </button>
                            </div>
                        </li>
                    `;
                })
                .join("");

            $("#file-list").append(`
                <p>Uploaded Files: ${fileCount}</p>
                <ul id="uploadedfiles">
                    ${fileListHtml}
                </ul>
            `);

            $(".remove-btn").on("click", function() {
                const index = $(this).data("index");
                removeFile(index);
            });

            $(".img-preview").click(function() {
                $("#popup-img").attr("src", $(this).attr("src"));
                $("#popup-preview").removeClass("hidden").fadeIn();
            });

            $("#popup-preview").click(function(event) {
                if (event.target.id === "popup-preview") {
                    $(this).fadeOut();
                }
            });

            $("#processSec").removeClass("hidden");
            $("#image-input").val("");

            function removeFile(index) {
                filesToProcess.splice(index, 1);
                displayFiles([]);
                if (filesToProcess.length === 0) {
                    $("#processSec").addClass("hidden");
                }
            }
            let cropper;
            let currentImageElement;
            let currentFileIndex;

            $(document).on("click", ".crop-img", function() {
                const imgSrc = $(this).closest("li").find(".img-preview").attr("src");
                $("#cropper-image").attr("src", imgSrc);
                $("#cropper-popup").removeClass("hidden");

                // Destroy previous cropper instance if exists
                if (cropper) cropper.destroy();

                // Initialize cropper
                const image = document.getElementById("cropper-image");
                cropper = new Cropper(image, {
                    aspectRatio: NaN, // Free crop
                    viewMode: 2,
                });

                // Store reference to the clicked image and index
                currentImageElement = $(this).closest("li").find(".img-preview");
                currentFileIndex = $(this).closest("li").attr("data-index");
            });

            $("#crop-image-btn").click(function() {
                const croppedCanvas = cropper.getCroppedCanvas();
                if (croppedCanvas) {
                    croppedCanvas.toBlob((blob) => {
                        const croppedImageUrl = URL.createObjectURL(blob);
                        currentImageElement.attr("src", croppedImageUrl); // Update UI

                        // Replace the file in the filesToProcess array
                        const croppedFile = new File([blob], filesToProcess[currentFileIndex].name, {
                            type: "image/png",
                            lastModified: Date.now()
                        });

                        filesToProcess[currentFileIndex] = croppedFile; // Update array with cropped image
                    }, "image/png");
                }

                $("#cropper-popup").addClass("hidden");
            });

            $("#close-cropper").click(function() {
                $("#cropper-popup").addClass("hidden");
            });
        }

        function resetFiles() {
            location.reload();
        }

        $("#remove-all-btn").on("click", function() {
            resetFiles();
        });

        $("#drop-area").on("dragover", function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass("hover");
        });

        $("#drop-area").on("dragleave", function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass("hover");
        });

        $("#drop-area").on("drop", function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass("hover");
            let dt = e.originalEvent.dataTransfer;
            let files = dt.files;
            displayFiles(files);
        });

        $("#image-input").on("change", function() {
            displayFiles(this.files);
        });

        $("#process-images").click(async function() {
            $("#popup-loading").removeClass("hidden")
            if (!filesToProcess.length) {
                alert("No files uploaded!");
                return;
            }
            $("#uploadSec").addClass("hidden");
            $("#processSec").addClass("hidden");
            $("#output").removeClass("hidden");
            const selectedLanguages = $(
                    'input[type="checkbox"]:checked'
                )
                .map(function() {
                    return this.value;
                })
                .get()
                .join("+");
            const progressBar = $("#progress-bar");
            const fileStatus = $("#file-status");
            let progressArray = new Array(filesToProcess.length).fill(
                0
            );

            progressBar
                .css("width", "0%")
                .attr("aria-valuenow", 0)
                .text("0%");
            fileStatus.text("Starting processing...");

            for (
                let index = 0; index < filesToProcess.length; index++
            ) {
                const file = filesToProcess[index];
                fileStatus.text(
                    `Processing file ${index + 1} of ${
                                filesToProcess.length
                            }`
                );

                await Tesseract.recognize(file, selectedLanguages, {
                    logger: (m) => {
                        if (m.status === "recognizing text") {
                            progressArray[index] = m.progress;
                            const totalProgress =
                                progressArray.reduce(
                                    (acc, cur) => acc + cur,
                                    0
                                ) / filesToProcess.length;
                                pl=0;
                                if(pl==0){
                                    $("#popup-loading").addClass("hidden")
                                    pl=1;
                                }
                            const formattedProgress = (
                                totalProgress * 100
                            ).toFixed(0);
                            progressBar
                                .css("width", formattedProgress + "%")
                                .attr(
                                    "aria-valuenow",
                                    formattedProgress
                                )
                                .text(formattedProgress + "%");
                        }
                    },
                }).then(({
                    data: {
                        text
                    }
                }) => {
                    const fileName = file.name;
                    const nameWithoutExt =
                        fileName.substring(
                            0,
                            fileName.lastIndexOf(".")
                        ) || fileName;
                    const extension = fileName.slice(
                        fileName.lastIndexOf(".")
                    );
                    const preview = file.type.startsWith("image/") ?
                        `<img class="img-preview w-32 h-32 object-cover rounded-lg cursor-pointer shadow-md hover:scale-105 transition" src="${URL.createObjectURL(
                                      file
                                  )}" alt="${
                                      file.name
                                      }" style="height: 50px; width: 100px; margin-right: 10px;" title="Preview" />` :
                        "";
                    const truncatedName =
                        nameWithoutExt.length > 6 ?
                        nameWithoutExt.substring(0, 3) +
                        "..." +
                        nameWithoutExt.slice(-3) :
                        nameWithoutExt;
                    table.row
                        .add([
                            preview + truncatedName + extension,
                            `<pre>` +
                            text +
                            `</pre><div class="cd">
                                            <span class="status"></span>
                                            <button class="copy-btn"><img
                                                src="/images/copy.svg"
                                                alt="Copy"
                                                height="20"
                                                title="Copy"
                                                style="height:20px"
                                            /></button>
                                            <button class="download-btn"><img
                                                src="/images/download.svg"
                                                alt="Download"
                                                height="20"
                                                title="Download"
                                                style="height:20px"
                                            /></button>
                                        </div>`,
                        ])
                        .draw(false);
                    progressArray[index] = 1;
                    const totalProgress =
                        progressArray.reduce(
                            (acc, cur) => acc + cur,
                            0
                        ) / filesToProcess.length;
                    const formattedProgress = (
                        totalProgress * 100
                    ).toFixed(0);
                    progressBar
                        .css("width", formattedProgress + "%")
                        .attr("aria-valuenow", formattedProgress)
                        .text(formattedProgress + "%");
                    if (index === filesToProcess.length - 1) {
                        fileStatus.text("Processing complete");
                        $(".progress").addClass("hidden");
                    }
                });
                $(".img-preview").click(function() {
                    $("#popup-img").attr("src", $(this).attr("src"));
                    $("#popup-preview").removeClass("hidden").fadeIn();
                });
                $("#popup-preview").click(function(event) {
                    if (event.target.id === "popup-preview") {
                        $(this).fadeOut();
                    }
                });
            }
        });
        $(document).on("click", ".copy-btn", function() {
            const textContent = $(this)
                .closest("td")
                .find("pre")
                .text()
                .trim();
            navigator.clipboard
                .writeText(textContent)
                .then(() => {
                    const $span = $(this).closest("td").find("span");
                    $span.text("Copied!");
                    setTimeout(function() {
                        $span.text("");
                    }, 1000);
                })
                .catch((err) => {
                    console.error("Failed to copy text: ", err);
                });
        });
        $(document).on("click", ".download-btn", function() {
            const textContent = $(this)
                .closest("td")
                .find("pre")
                .text()
                .trim();
            const blob = new Blob([textContent], {
                type: "text/plain"
            });
            const url = URL.createObjectURL(blob);
            const link = document.createElement("a");
            link.href = url;
            link.download = "extracted_text.txt";
            link.click();
            URL.revokeObjectURL(url);
            const $span = $(this).closest("td").find("span");
            $span.text("Downloaded!");
            setTimeout(function() {
                $span.text("");
            }, 1000);
        });
        $(document).on("click", "#download-all-btn", async function() {
            const zip = new JSZip();
            const files = [];
            let count = 0;

            $("#output td").each(function() {
                const textContent = $(this).find("pre").text();
                if (textContent.trim()) {
                    zip.file(
                        `extracted_text_${count + 1}.txt`,
                        textContent
                    );
                    count++;
                }
            });

            zip.generateAsync({
                type: "blob"
            }).then(function(content) {
                const link = document.createElement("a");
                const url = URL.createObjectURL(content);
                link.href = url;
                link.download = "extracted_texts.zip";
                link.click();
                URL.revokeObjectURL(url);
            });
        });

        $("#upload-url-btn").click(async function() {
            const imageUrl = $("#image-url-input").val().trim();
            if (!imageUrl) {
                alert("Please enter a valid image URL!");
                return;
            }
            try {
                const response = await fetch(imageUrl);
                const blob = await response.blob();
                if (!blob.type.startsWith("image/")) {
                    alert("Invalid image format. Please enter a valid image URL.");
                    return;
                }
                const fileName = imageUrl.split("/").pop().split("?")[0];
                const file = new File([blob], fileName, {
                    type: blob.type
                });
                filesToProcess.push(file);
                displayFiles([]);
                $("#image-url-input").val("");
            } catch (error) {
                alert("Failed to fetch image. Please check the URL and try again.");
                console.error("Error fetching image:", error);
            }
        });
    });
</script>