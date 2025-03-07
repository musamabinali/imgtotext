<template>
    <div id="popup-loading" class="hidden fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center z-40">
        <img :src="'images/loading.gif'" class="max-w-full max-h-[100px] rounded-lg shadow-lg">
    </div>
    <div id="popup-preview" class="hidden fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center z-40">
        <img id="popup-img" class="max-w-full max-h-[90vh] rounded-lg shadow-lg">
    </div>
    <div id="cropper-popup" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-40">
        <div class="bg-white p-4 rounded-md shadow-lg">
            <img id="cropper-image" class="max-w-full max-h-[400px]" />
            <div class="flex justify-between mt-4">
                <button id="crop-image-btn" class="bg-blue-500 text-white px-4 py-2 rounded">Crop</button>
                <button id="close-cropper" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </div>
        </div>
    </div>

    <div class="container py-3 mx-auto mt-4">
        <input class="hidden" type="checkbox" value="eng" checked id="english" />
        <div id="uploadSec" class="mb-3">
            <div id="drop-area" class="border-dashed border rounded p-6 text-center grid justify-items-center">
                <img :src="'images/upload.webp'" onclick="document.getElementById('image-input').click()" alt="upload"
                    width="200" />
                <p class="text-2xl my-3">Drop / Past your images here</p>
                <button class="btn btn-primary text-white bg-blue-500 py-2 px-4 rounded-md" onclick="document.getElementById('image-input').click()">Choose
                    Files</button>
                <input type="file" id="image-input" class="form-control hidden" accept=".jpg, .jpeg, .png" multiple />
                <div class="flex gap-2 mt-4">
                    <input type="text" id="image-url-input" placeholder="Enter image URL" class="border p-2 w-full py-2 px-4 rounded-md">
                    <button id="upload-url-btn" class="btn btn-primary text-white bg-blue-500 py-2 px-4 rounded-md">➤</button>
                </div>

            </div>
        </div>
        <div id="processSec" class="grid grid-cols-1 gap-4 hidden">
            <div id="file-list"></div>
            <div class="flex justify-between">
                <a href="/image-to-text" class="btn btn-danger bg-red-500 text-white py-2 px-4 rounded-md">Start Over</a>
                <button id="process-images" class="btn btn-primary text-white bg-blue-500 py-2 px-4 rounded-md">
                    Convert
                </button>
            </div>
            <div id="file-status" class="mb-1"></div>
        </div>
        <div id="output" class="hidden">
            <div class="progress mb-3">
                <div id="progress-bar" class="bg-blue-500 progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                    aria-valuemin="0" aria-valuemax="100">
                    0%
                </div>
            </div>
            <table id="results-table" class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">File Name</th>
                        <th class="text-left text-sm">Extracted Text</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="flex justify-between mt-3">
                <a href="/image-to-text" class="btn btn-danger bg-red-500 text-white py-2 px-4 rounded-md">Start Over</a>
                <button id="download-all-btn" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded-md">
                    Download All
                </button>
            </div>
        </div>
    </div>
</template>
