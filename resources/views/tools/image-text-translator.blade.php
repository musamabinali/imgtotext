<x-app-layout>
    <x-slot name="meta">
        <title>Image text translator</title>
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

        <script src="/js/jquery-3.6.0.min.js"></script>
        <link href="/css/imgtr.css" rel="stylesheet">
    </x-slot>
    <x-slot name="alternate">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if(trim($localeCode) == 'en')
        <link rel="alternate" hreflang="x-default" href="https://www.myconvertertool.com/image-text-translator" />
        <link rel="alternate" hreflang="{{ $localeCode }}" href="https://www.myconvertertool.com/image-text-translator" />
        @else
        <link rel="alternate" hreflang="{{$localeCode }}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated($localeCode,'routes.png-jpg-convert')}}" />
        @endif
        @endforeach
    </x-slot>
    <div class="container mx-auto pt-5 max-w-[1232px]">
        <h1 class="text-center font-semibold text-[35px]">Free Image text translator converter</h1>
    </div>
    <div class="w-full justify-center items-center gap-4 rounded-md my-12">
        <imgtr-component />
    </div>
    </x-app-layout>
    <script>
        function process(file) {
            document.querySelector(".result").innerHTML = "";
            var src = (window.URL ? URL : webkitURL).createObjectURL(file);
            document.getElementById("image").setAttribute("src", src);
            Tesseract.recognize(file)
                .progress(function (data) {
                    progress(data);
                })
                .then(function (data) {
                    result(data);
                });
                $("#file").val("");
        }
        function progress(packet) {
            var r = document.querySelector("#output-text");

            if (r && r.querySelector(".status")) {
                if ("progress" in packet) {
                    r.querySelector("progress").value = packet.progress;
                }
            } else {
                r.innerHTML  = `
                <div class="col-12 status flex h-[298px] pb-5">
                    <img src="images/loading.gif" class="m-auto max-w-full max-h-[100px] rounded-lg shadow-lg">
                </div>`;
            }
        }
        function result(data) {
            var r = document.querySelector("#text");
            r.value = data.text;
                event.preventDefault();

                let from = $("#from").val();
                let to = $("#to").val();
                let text = $("#text").val();

                $.ajax({
                    url: "{{ route('translate') }}",
                    method: "POST",
                    data: {
                        from: from,
                        to: to,
                        text: text,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        $("#output-text").html(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert("An error occurred. Please try again.");
                    },
                });
        }
        document.addEventListener("DOMContentLoaded", function () {
            const outputText = document.getElementById("output-text");
            const copyBtn = document.querySelector(".copy-btn");
            const downloadBtn = document.querySelector(".download-btn");
            const status = document.querySelector(".status");

            // Copy text to clipboard
            copyBtn.addEventListener("click", function () {
                const text = outputText.innerText;
                navigator.clipboard.writeText(text).then(() => {
                    status.innerText = "Copied!";
                    setTimeout(() => status.innerText = "", 2000);
                }).catch(err => {
                    console.error("Copy failed: ", err);
                });
            });

            // Download text as a file
            downloadBtn.addEventListener("click", function () {
                const text = outputText.innerText;
                const blob = new Blob([text], { type: "text/plain" });
                const a = document.createElement("a");
                a.href = URL.createObjectURL(blob);
                a.download = "translated-img.txt";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
        });

    </script>
    <script src="/js/tesseract.js"></script>