<template>
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center">
            <div class="w-full lg:w-1/2 my-3">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header flex justify-between items-center py-4 px-6 bg-gray-100 rounded-t-lg">
                        <h5 class="font-medium">Upload image</h5>
                        <span>
                            <label for="from" class="mr-2">From Language:</label>
                            <select id="from" name="from" class="border border-gray-300 rounded-md p-1">
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="es">Spanish</option>
                                <option value="de">German</option>
                                <option value="it">Italian</option>
                                <option value="pt">Portuguese</option>
                                <option value="nl">Dutch</option>
                                <option value="ru">Russian</option>
                                <option value="zh">Chinese</option>
                                <option value="ja">Japanese</option>
                                <option value="ko">Korean</option>
                                <option value="hi">Hindi</option>
                                <option value="ar">Arabic</option>
                                <option value="tr">Turkish</option>
                                <option value="sv">Swedish</option>
                                <option value="pl">Polish</option>
                                <option value="da">Danish</option>
                                <option value="fi">Finnish</option>
                                <option value="cs">Czech</option>
                                <option value="el">Greek</option>
                            </select>
                        </span>
                    </div>
                    <div class="card-body py-6 px-6 h-full">
                        <div class="upload-img grid justify-center items-center h-[314px]">
                            <img
                                id="image"
                                class="img-fluid cursor-pointer"
                                :src="'images/upload.webp'"
                                onclick="document.getElementById('file').click()"
                                alt="upload"
                            />
                            <p
                                onclick="document.getElementById('file').click()"
                                class="btn btn-primary mt-4 bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer"
                            >Choose File</p>
                        </div>
                        <input
                            id="file"
                            type="file"
                            class="hidden"
                            accept=".jpg, .jpeg, .png"
                            onchange="process(window.lastFile=this.files[0])"
                        />
                    </div>
                    <div class="card-footer flex bg-gray-100 rounded-b-lg py-4 px-6">
                        <a href="/image-text-translator" class="reset ml-auto">
                            <img
                                :src="'images/reset.svg'"
                                alt="Reset"
                                height="20"
                                title="Reset"
                                class="cursor-pointer"
                            />
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 my-3">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header flex justify-between items-center py-4 px-6 bg-gray-100 rounded-t-lg">
                        <h5 class="font-medium">Translated Image Text</h5>
                        <span>
                            <label for="to" class="mr-2">To Language:</label>
                            <select id="to" name="to" class="border border-gray-300 rounded-md p-1">
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="es">Spanish</option>
                                <option value="de">German</option>
                                <option value="it">Italian</option>
                                <option value="pt">Portuguese</option>
                                <option value="nl">Dutch</option>
                                <option value="ru">Russian</option>
                                <option value="zh">Chinese</option>
                                <option value="ja">Japanese</option>
                                <option selected value="ko">Korean</option>
                                <option value="hi">Hindi</option>
                                <option value="ar">Arabic</option>
                                <option value="tr">Turkish</option>
                                <option value="sv">Swedish</option>
                                <option value="pl">Polish</option>
                                <option value="da">Danish</option>
                                <option value="fi">Finnish</option>
                                <option value="cs">Czech</option>
                                <option value="el">Greek</option>
                            </select>
                        </span>
                    </div>
                    <div class="card-body py-6 px-6">
                        <div class="content-result">
                            <div class="row result"></div>
                            <input
                                type="text"
                                id="text"
                                name="text"
                                class="hidden"
                                placeholder="Enter text to translate" />
                            <div id="output-text" class="text-gray-800 mt-4">Translated text...</div>
                        </div>
                    </div>
                    <div class="card-footer bg-gray-100 rounded-b-lg py-4 px-6 flex justify-end gap-4">
                        <span class="status"></span>
                        <button class="copy-btn">
                            <img
                                :src="'images/copy.svg'"
                                alt="Copy"
                                height="20"
                                title="Copy"
                                class="cursor-pointer"
                            />
                        </button>
                        <button class="download-btn">
                            <img
                                :src="'images/download.svg'"
                                alt="Download"
                                height="20"
                                title="Download"
                                class="cursor-pointer"
                            />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
