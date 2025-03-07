<div>
    <div class="w-full  px-2 pt-4 bg-green-800">
        <div class="max-w-8xl flex flex-wrap mx-auto py-4">
            <div class="mx-[100px] text-white">
            <h1 class="sm:text-4xl lg:text-6xl"><b>Free online file <br> converter</b></h1>
             <h2 class="text-[17px] mt-[40px]">Convert media files online from one format into another. Please <br>select the target format below:</h2>
            </div>
            <div class= "bg-[url('./images/placeholder_hero.svg')] w-[400px] h-[255px]">
                 {{-- <img src="./images/placeholder_hero.svg" alt="placeholder_hero" class="w-[650px] h-[200px]"> --}}
                 <div class="dropdown  flex flex-wrap text-white my-[60px] ml-[-40px]">
                     <span  class="text-[30px]"><b>Convert</b></span>
                     <button  id="sourceCategorySelector" class="btn text-normal border font-size-125 bg-white text-black mx-2" style="min-width:95px;"><span>...</span><i  class="fa fa-chevron-down" class="text-[15px]"></i></button>
 {{-- 2nd btn --}}
                     <span  class="text-[30px]">to</span>
                     <button  id="MydataInfo" class="btn text-normal border font-size-125 bg-white text-black mx-2" style="min-width:95px;"><span>...</span> <i  class="fa fa-chevron-down" class="text-[15px]"></i></button>
                 </div>
                 <div class="dropdown-menu hidden absolute bg-gray-100 my-[-55px] text-black border border-gray-300" id="sourceSelector">
                    <div class="w-100 flex flex-wrap border-bottom">
                          <div class="py-2  align-items-center vuetiful-icon-wrapper">
                            <i class="fa fa-light fa-magnifying-glass w-[30px] mx-3"></i>
                          </div>
                          <div class="position-relative align-items-center w-100">
                            <input name="search_search" autocomplete="off" type="text" class="no-border w-100 rounded-left-0 no-border-radius border-none hover:border-none  vuetiful-input" placeholder="search">
                          </div>
                    </div>
                   <ul>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Archive</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Audio</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Cad</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Document</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Ebook</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Image</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Misc</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Presentation</a>

                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Spreadsheet</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Vector</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Video</a>
                      </li>
                   </ul>
                  </div>
                  {{-- 2nd button menu --}}
                  <div class="dropdown-menu hidden absolute bg-white my-[-55px] mx-[60px]  text-black" id="mymanu">
                    <div class="w-100 flex flex-wrap border-bottom">
                          <div class="py-2  align-items-center vuetiful-icon-wrapper">
                            <i class="fa fa-light fa-magnifying-glass w-[30px] mx-3"></i>
                          </div>
                          <div class="position-relative align-items-center w-100">
                            <input name="search_search" autocomplete="off" type="text" class="no-border w-100 rounded-left-0 no-border-radius border-none hover:border-none  vuetiful-input" placeholder="search">
                          </div>
                    </div>
                    <ul>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Archive</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Audio</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Cad</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Document</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Ebook</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Image</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Misc</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Presentation</a>

                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Spreadsheet</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Vector</a>
                      </li>
                      <li class="border border-gray-300 hover:bg-gray-200 w-[100px] rounded-sm p-1">
                        <a href="#">Video</a>
                      </li>
                    </ul>
                   </div>
            </div>
        </div>
    </div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
