<div>
    {{-- <div class="max-w-8xl flex flex-wrap justify-center bg-green-600">
        <div class="max-w-4xl border-dashed border-2  border-gray-500">
              1
        </div>

   </div> --}}
    <div class="container mx-auto pt-5">
        <h1 class="text-center font-semibold text-[35px]">PDF To JPG</h1>
        <p class="text-center">
            Convert any PDF file to JPG or extract all the images contained in a
            PDF.
        </p>
        <div class="w-full justify-center  items-center gap-4">
            <Pdf-To-Jpg-component  :translations="{{ json_encode(__('_')) }}"></Pdf-To-Jpg-component>

        </div>
        </div>
        <div class="w-full  mt-5">
            <div class="max-w-8xl flex flex-warp justify-center  pt-5">
                <div class="text-center w-1/2 p-5 mx-auto">
                    <p class="text-[50px] text-red-500">
                        <i class="fa fa-clone _theme_color" aria-hidden="true"></i>
                    </p>
                    <h5 class="font-bold">PDF to JPG conversion</h5>
                    <p class=" ">
                        Use our online converter to quickly convert your PDF files
                        to high quality JPG images in seconds. There is no file size
                        limit and no registration is required. Just upload your
                        file, our converter converts the file into jpg format.
                    </p>
                </div>
                <div class="w-1/2 p-5 mx-auto text-center">
                    <p class="text-[50px] text-red-500">
                        <i class="fa fa-lock _theme_color"></i>
                    </p>
                    <h5 class="font-bold">Secure file conversion</h5>
                    <p class="answer-custom-style">
                        Our wowpdf converter provides full security for your files.
                        All your files will be permanently deleted from our servers.
                    </p>
                </div>
                <div class="w-1/2 p-5 mx-auto text-center">
                    <p class="text-[50px] text-red-500">
                        <i class="fa fa-thumbs-up _theme_color"></i>
                    </p>
                    <h5 class="font-bold">Quality</h5>
                    <p class="answer-custom-style px-lg-3">
                        Use the PDF to JPG converter to convert entire PDF pages
                        into high-quality JPG images. All image quality and
                        resolution are preserved.
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h2 class="text-center text-[40px] pt-5 font-semibold text-heading">
                How to convert PDF to JPG online
            </h2>
            <section class="my-5">
                <div class="w-full flex py-5">
                    <div class="max-w-8xl mx-auto">
                        <div class="flex flex-wrap justify-items-center items-center">
                            <div class="px-5">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                width="600" viewBox="0 0 922.37 314.82"><defs><style>.cls-1{fill:#fcb12a;}.cls-2{fill:#ef4535;}.cls-3{fill:#fff;}.cls-4{fill:#010101;}.cls-5{fill:#f1592b;}</style></defs><path class="cls-1" d="M472,189.79a8.93,8.93,0,0,1-6.35-15.21l17.09-17.25-17.06-17.06a8.93,8.93,0,0,1,12.63-12.63L501.61,151a8.93,8.93,0,0,1,0,12.59l-23.33,23.57A8.9,8.9,0,0,1,472,189.79Z"/><path class="cls-1" d="M495.36,166.3H427a8.93,8.93,0,0,1,0-17.86h68.41a8.93,8.93,0,0,1,0,17.86Z"/><path class="cls-2" d="M230.39,0H28.47A28.48,28.48,0,0,0,0,28.46V286.11a28.61,28.61,0,0,0,28.45,28.7H230.39a28.61,28.61,0,0,0,28.46-28.7V28.46A28.49,28.49,0,0,0,230.39,0ZM241,286.11A10.74,10.74,0,0,1,230.39,297H28.45a10.73,10.73,0,0,1-10.59-10.84V28.46a9.28,9.28,0,0,1,.06-1.06,8.68,8.68,0,0,1,.16-1l.12-.51a9.84,9.84,0,0,1,.51-1.47A11,11,0,0,1,19.42,23l.28-.44c.19-.28.4-.55.62-.82s.45-.51.69-.75a11.19,11.19,0,0,1,1.16-1,7.76,7.76,0,0,1,.84-.57l.45-.26.46-.24a10.07,10.07,0,0,1,.95-.41l.49-.17a10.37,10.37,0,0,1,3.11-.48H230.39A10.56,10.56,0,0,1,237.84,21l.36.37a9.81,9.81,0,0,1,1,1.2,10.75,10.75,0,0,1,1.19,2.28,10.37,10.37,0,0,1,.31,1,10.26,10.26,0,0,1,.34,2.61Z"/><path class="cls-2" d="M183.17,172.37a5.47,5.47,0,0,0-1.58-2.72c-2.17-2.13-6.94-3.25-14.21-3.36a117.27,117.27,0,0,0-17.08,1.26,42.64,42.64,0,0,1-7.92-5.47,57.92,57.92,0,0,1-14.31-22.2c.2-.81.38-1.52.55-2.24,0,0,3.41-19.42,2.51-26a7.14,7.14,0,0,0-.45-1.86l-.29-.76c-.93-2.15-2.75-4.42-5.61-4.3l-1.69,0h0c-3.21,0-5.79,1.63-6.48,4.06-2.06,7.65.07,19.1,4,33.9l-1,2.42c-2.78,6.78-6.25,13.6-9.32,19.61l-.39.77c-3.24,6.32-6.17,11.7-8.84,16.24l-2.74,1.45c-.2.1-4.9,2.6-6,3.25-9.35,5.6-15.54,11.93-16.58,17-.33,1.62-.08,3.67,1.59,4.62l2.65,1.34a8.09,8.09,0,0,0,3.61.86c6.67,0,14.4-8.3,25.06-26.89a249,249,0,0,1,38.59-9.17C156.5,179.35,168,183,175.27,183a13,13,0,0,0,3.3-.36,5.71,5.71,0,0,0,3.29-2.24C183.27,178.3,183.55,175.37,183.17,172.37ZM82.06,205.11c1.2-3.33,6-9.9,13.14-15.72.44-.37,1.55-1.4,2.54-2.36C90.31,198.89,85.33,203.61,82.06,205.11Zm42.12-97c2.13,0,3.35,5.39,3.46,10.45a21.6,21.6,0,0,1-2.55,11.25,54.8,54.8,0,0,1-1.81-14S123.19,108.11,124.18,108.11Zm-12.57,69.12q2.23-4,4.63-8.47A160.13,160.13,0,0,0,124.37,151a58.49,58.49,0,0,0,13.41,16.65c.67.55,1.38,1.12,2.1,1.69A170.48,170.48,0,0,0,111.61,177.23Zm67.89-.6a10,10,0,0,1-3.73.63c-3.9,0-8.74-1.77-15.5-4.68,2.6-.19,5-.29,7.13-.29a27.39,27.39,0,0,1,8.9,1C180.12,174.23,180.17,176.21,179.5,176.63Z"/><polygon class="cls-1" points="887.22 86.83 834.41 86.83 834.41 32.87 852.26 32.87 852.26 68.97 887.22 68.97 887.22 86.83"/><rect class="cls-1" x="702.45" y="197.91" width="180.87" height="66.88" rx="0.16"/><path class="cls-1" d="M893.77,314.82H692a28.64,28.64,0,0,1-28.61-28.59V28.6A28.65,28.65,0,0,1,692,0H893.77a28.64,28.64,0,0,1,28.6,28.6V286.23A28.63,28.63,0,0,1,893.77,314.82ZM692,17.86A10.75,10.75,0,0,0,681.26,28.6V286.23A10.75,10.75,0,0,0,692,297H893.77a10.75,10.75,0,0,0,10.74-10.73V28.6a10.75,10.75,0,0,0-10.74-10.74Z"/><path class="cls-1" d="M841.9,185.22h-98a1.88,1.88,0,0,1-1.88-1.88V101.41a1.89,1.89,0,0,1,1.88-1.89h98a1.89,1.89,0,0,1,1.88,1.89v81.93A1.88,1.88,0,0,1,841.9,185.22Zm-96.15-3.76H840V103.29H745.75Z"/><path class="cls-1" d="M826.06,169H759.71a1.88,1.88,0,0,1-1.88-1.88V154.45a1.88,1.88,0,0,1,.62-1.4L774.17,139a1.88,1.88,0,0,1,2.42-.08l7.7,6,18-17.34a1.88,1.88,0,0,1,2.49-.11l22.46,18.17a1.89,1.89,0,0,1,.69,1.46v20A1.88,1.88,0,0,1,826.06,169Zm-64.47-3.76h62.59V148l-20.47-16.56-18,17.33a1.89,1.89,0,0,1-2.47.12l-7.74-6.07-13.92,12.47Z"/><path class="cls-1" d="M770.71,132.87a8.56,8.56,0,1,1,8.56-8.56A8.57,8.57,0,0,1,770.71,132.87Zm0-13.35a4.79,4.79,0,1,0,4.79,4.79A4.8,4.8,0,0,0,770.71,119.52Z"/><path class="cls-3" d="M746,211.49h7.94v27.42a12.46,12.46,0,0,1-3.62,9.39,12.81,12.81,0,0,1-9.29,3.49q-6.3,0-10-3.11t-3.54-9l0-.17h7.75a6.26,6.26,0,0,0,1.56,4.68,5.72,5.72,0,0,0,4.17,1.52,4.32,4.32,0,0,0,3.58-1.82,8,8,0,0,0,1.39-5Z"/><path class="cls-3" d="M769.13,236.81v14.41h-8V211.49h15.2q6.84,0,10.77,3.49a12.69,12.69,0,0,1,0,18.36q-3.93,3.48-10.77,3.47Zm0-6.14h7.24a6.61,6.61,0,0,0,5-1.81,6.44,6.44,0,0,0,1.72-4.63,6.76,6.76,0,0,0-1.7-4.73,6.51,6.51,0,0,0-5.06-1.87h-7.24Z"/><path class="cls-3" d="M819.48,233.75H804.74v11.36h17.52v6.11H796.78V211.49h25.43v6.14H804.74v10h14.74Z"/><path class="cls-3" d="M858.31,245.79a15.14,15.14,0,0,1-5.54,4.21,21.7,21.7,0,0,1-9.5,1.79,16.07,16.07,0,0,1-11.79-4.53,15.83,15.83,0,0,1-4.58-11.76v-8.3a16.05,16.05,0,0,1,4.45-11.74,15.28,15.28,0,0,1,11.43-4.55q7.29,0,11.16,3.46a11.35,11.35,0,0,1,3.74,9.21l0,.16h-7.51a6.53,6.53,0,0,0-1.83-4.93,7.39,7.39,0,0,0-5.32-1.76,7.15,7.15,0,0,0-5.89,2.83,11.36,11.36,0,0,0-2.24,7.27v8.35a11.3,11.3,0,0,0,2.29,7.34,7.5,7.5,0,0,0,6.14,2.84,14.21,14.21,0,0,0,4.49-.57,7,7,0,0,0,2.55-1.45V236h-7.64v-5.51h15.64Z"/><rect class="cls-2" x="520.22" y="254.35" width="1.8" height="10.29"/><rect class="cls-2" x="520.22" y="272.27" width="1.8" height="10.29"/><rect class="cls-2" x="524.93" y="267.56" width="10.29" height="1.8"/><rect class="cls-2" x="507.02" y="267.56" width="10.29" height="1.8"/><rect class="cls-4" x="322.15" y="19.17" width="1.78" height="10.17"/><rect class="cls-4" x="322.15" y="36.88" width="1.78" height="10.17"/><rect class="cls-4" x="326.81" y="32.22" width="10.17" height="1.78"/><rect class="cls-4" x="309.1" y="32.22" width="10.17" height="1.78"/><circle class="cls-2" cx="299.09" cy="285.64" r="10.01"/><circle class="cls-5" cx="627.8" cy="73.98" r="5.48"/><circle class="cls-4" cx="494.39" cy="93.93" r="5.48"/></svg>

                            </div>
                            <div class=" ">
                                <h4 class="font-bold text-md pl-4 pt-lg-3 my-[50px]">Follow these easy steps to turn
                                    PDFs into JPGs</h4>
                                {{-- @lang('home.convert_pdf_list_heading') --}}
                                <ol class=" pt-3 my-[20px]">
                                    <li class="py-1">
                                        1. Just <b>upload</b> your file into the PDF to the JPG
                                        <b>converter</b>.
                                    </li>
                                    {{-- @lang('home.convert_pdf_list1') --}}
                                    <li class="py-1">
                                        2. <b>Click</b> and <b>wait</b> for the process to
                                        complete.</li>
                                    {{-- @lang('home.convert_pdf_list2') --}}
                                    <li class="py-1">
                                        3. The <b>conversion</b> to PDF should be done
                                        <b>immediately</b>.
                                    </li>
                                    {{-- @lang('home.convert_pdf_list3') --}}
                                    <li class="py-1">
                                        4. <b>Download</b> the converted files as <b>JPG files</b>.</li>
                                    {{-- @lang('home.convert_pdf_list4') --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <div class="mt-5 p-5 pt-[80px] pb-[80px] [&_h2]:font-bold [&_h2]:my-6 [&_hr]:my-4 [&_h2]:text-4xl [&_h2]:pt-5 [&_h3]:text-xl [&_h3]:font-bold [&_h3]:mt-2 [&_h3]:pb-2 [&_a]:text-primary mt-6 max-w-4xl mx-auto">
        {{-- @lang('home.convert_pdf_list4') --}}

    </div>
        <div class="max-w-6xl mx-auto mt-5">
            <h3 class="mb-5 text-[40px] text-center pt-5  text-heading">
                Questions? We have answers.
            </h3>
            <div class="flex">
                <div class="w-1/2 p-5 mx-auto">
                    <h4 class="">
                        <b>
                            Is what pdf to jpg converter is compatible on all <br>
                            platforms?
                        </b>
                    </h4>
                </div>
                <div class="w-1/2 mx-auto">
                    <p class="col-12 col-lg-10 pl-0 answer-custom-style">
                        What makes this wowPDF tool so great is that it allows its
                        users to choose which platform they want to use to convert
                        their files. So you can freely convert your PDF files to JPG
                        with any Mac, Windows or Linux framework.
                    </p>
                    <p class="pl-0">
                        PDF to JPG conversion is accessible and available for any
                        web browser. As long as your browser works fine, you will
                        have no trouble finding and using this online PDF to JPG
                        converter.
                    </p>
                </div>
            </div>
            <div class="flex  pb-3">
                <div class="w-1/2 p-5 mx-auto">
                    <h4><b>How to protect our file from viruses? </b></h4>
                </div>
                <div class="w-1/2  mx-auto">
                    <p class= "pl-0">
                        Data privacy and file security are a major concern for
                        obvious reasons such as virus attacks and plagiarism. Our
                        wowPDF to JPG Converter will help you to convert and
                        download files to ensure your data security is not
                        compromised. As a result, the converted files are safe and
                        protected from online threats.
                    </p>
                </div>
            </div>
            <div class="flex  pb-3">
                <div class="w-1/2 p-5 mx-auto">
                    <h4><b>How do we convert back to pdf when you need it?</b></h4>
                </div>
                <div class="w-1/2  mx-auto">
                    <p class="pl-0">
                        Do you want to reconnect with your wowPDF. Convert your
                        files to jpg format with just one click! Save time, increase
                        your productivity. Our online PDF to JPG converter tool will
                        easily modify your JPG file or convert it back to PDF file
                        for free.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>
