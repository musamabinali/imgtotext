<div>
    <section id="featured-services" class="featured-services circle-right">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h3 class="font-bold text-3xl">Most Popular PDF Tools</h3>
            {{-- @lang('home.most_popular_heading') --}}
            <p class="text-xl">Tools to convert,compress, and edit PDFs for free. Try it out today!</p>
            {{-- @lang('home.most_popular_subheading') --}}
        </div>
        {{-- <div class="container mb-lg-5 mb-5 aos-init aos-animate" data-aos="fade-up"> --}}
            <div class="w-full lg:mx-[140px] my-[30px]" data-aos="fade-up">
            {{-- <div class="row mb-lg-5"> --}}
                <div class="max-w-8xl flex flex-wrap">
                {{-- <div class="col-md-12 col-lg-4 col-12  align-items-stretch mb-5 mb-lg-0"> --}}
                <div class="border-solid border-2 border-black hover:border-red-600 hover:border-4 rounded-2xl">
                   <a href="{{route('docx-convert')}}" class="">
                       <div class="flex flex-wrap my-[30px] p-[10px]" >
                        <div class=" ">
                            <img  class="ml-3 w-[70px] h-[70px]" src="/images/feature-icons/word-to-pdf.svg" alt="word-to-pdf">
                        </div>
                        <div class="mt-5 ml-2">
                            <h5 class="font-bold text_align adjust-margin custom-font-family" >Word to PDF</h5>
                            {{-- @lang('home.word_topdf_heading') --}}
                            <p class="text_align m-0">Convert Word docs to PDFs</p>
                            {{-- @lang('home.word_topdf_subheading') --}}
                        </div>
                    </div>
                   </a>
                </div>
                <div class="border-solid border-2 border-black hover:border-red-600 hover:border-4 rounded-2xl  mx-[30px] ">
                    <a href="{{route('xlsx-convert')}}" class="text-decoration-none">
                    <div class="flex flex-wrap my-[30px] p-[10px]" >
                        <div class=" " >
                            <img class="ml-3 w-[70px] h-[70px]" class="ml-n3" src="/images/feature-icons/xls-to-pdf.svg" alt="xls-to-pdf">
                        </div>
                        <div class="mt-5">
                            <h5 class="font-bold text_align adjust-margin custom-font-family">Spreadsheet to PDF</h5>
                            {{-- @lang('home.stylesheet_topdf_heading') --}}
                            <p class="text_align m-0">Convert Spreadsheet to PDFs</p>
                            {{-- @lang('home.stylesheet_topdf_subheading') --}}
                        </div>
                    </div>
                    </a>
                </div>
                <div class="border-solid border-2 border-black hover:border-red-600 hover:border-4 rounded-2xl ">
                    <a href="{{route('pptx-convert')}}" class="text-decoration-none">
                    <div class="flex flex-wrap my-[30px] p-[10px]" >
                        <div class="" >
                            <img class="ml-3 w-[70px] h-[70px]"  src="/images/feature-icons/ppt-to-pdf.svg" alt="ppt-to-pdf">
                        </div>
                        <div class="mt-5">
                            <h5 class="font-bold text_align adjust-margin custom-font-family">Presentation to PDF</h5>
                            {{-- @lang('home.Presentation_topdf_heading') --}}
                            <p class="text_align m-0">Convert Presentation to PDFs</p>
                            {{-- @lang('home.Presentation_topdf_subheading') --}}
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="w-full my-[30px] ">
            <div class="max-w-8xl flex flex-wrap">
                <div class="border-solid border-2 border-black hover:border-red-600 hover:border-4 rounded-2xl w-[309px]">
                    <a href="{{route('img-convert')}}" class="text-decoration-none">
                        {{--                        <a href="#">--}}
                    <div class="flex flex-wrap my-[30px] p-[10px]" >
                        <div class=" " >
                            <img class="ml-3 w-[70px] h-[70px]" src="/images/feature-icons/image-to-pdf.svg" alt="image-to-pdf">
                        </div>
                        <div class="mt-5 ml-3">
                            <h5 class="font-bold text_align adjust-margin custom-font-family">Image to PDF</h5>
                            {{-- @lang('home.Image_topdf_heading') --}}
                            <p class="text_align m-0">Convert Images to PDFs</p>
                            {{-- @lang('home.Image_topdf_subheading') --}}
                        </div>
                    </div>
                    </a>
                </div>
                <div class="border-solid border-2 border-black hover:border-red-600 hover:border-4 rounded-2xl mx-[30px] w-[309px]">
                    <a href="{{route('pdf-png-convert')}}" class="text-decoration-none">
                    {{--                        <a href="#">--}}
                    <div class="flex flex-wrap my-[30px] p-[10px]" >
                        <div class=" " >
                            <img class="ml-3 w-[70px] h-[70px]" src="/images/feature-icons/pdf-to-png.svg" alt="pdf-to-png">
                        </div>
                        <div class="mt-5">
                            <h5 class="font-bold text_align adjust-margin custom-font-family">PDF to PNG</h5>
                            {{-- @lang('home.pdftopng_heading') --}}
                            <p class="text_align m-0">Convert PDFs to PNGs</p>
                            {{-- @lang('home.pdftopng_subheading') --}}
                        </div>
                    </div>
                    </a>
                </div>
                <div class="border-solid border-2 border-black hover:border-red-600 hover:border-4 rounded-2xl w-[309px]">
                    <a href="{{route('pdf-jpg-convert')}}" class="text-decoration-none">
                    <div class="flex flex-wrap my-[30px] p-[10px]" >
                        <div class=" " >
                            <img class="ml-3 w-[70px] h-[70px]" src="/images/feature-icons/pdf-to-jpg.svg" alt="pdf-to-jpg">
                        </div>

                        <div class="mt-5">
                            <h5 class="font-bold text_align adjust-margin custom-font-family">PDF to JPEG</h5>
                            <p class="text_align m-0">Convert PDFs to JPEGs</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <br>
        <div class="text-center mt-[10px]"  >
            <a class="btn bg-red-600 rounded-2xl px-[30px] py-2  text-xl text-white" href="#" tabindex="-1" aria-disabled="true">See All PDF Tools</a>
       </div>
    </section>
</div>
