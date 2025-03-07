<template>
    <div>
        <div class="flex flex-wrap gap-3 bg-blue-300 rounded-lg" v-if="!this.submitted">
            <div class="h-auto min-h-fit rounded-lg p-3  rounded-lg flex-grow">
                <div @drop.prevent="dropFile" @dragenter="dropFile" @dragover="dropFile" :class="{ ' bg-pink-800': dragActive }" style="height: 280px" class=" flex items-center justify-center w-full px-12 py-8 border-4 border-gray-300 border-dashed rounded dark:border-2">
                    <div class="flex flex-col items-center justify-center gap-1 w-full text-white dark:text-gray-100 py-2">
                        <p  class="text-base md:text-xl font-semibold text-black">Drop file and click here</p>
                        <label  for="file" class="w-30 flex flex-col items-center bg-[#E2E6EA] px-5 py-2 rounded-lg shadow-lg   border  cursor-pointer text-black">
                            <span class="text-gray-800 font-semibold dark:text-gray-100 flex my-auto mx-auto">
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" class="mr-1.5 mt-1" xmlns="http://www.w3.org/2000/svg"><path d="M14.4033 8.6V5L10.8033 1H2.40327C2.1911 1 1.98762 1.08429 1.83759 1.23431C1.68756 1.38434 1.60327 1.58783 1.60327 1.8V16.2C1.60327 16.4122 1.68756 16.6157 1.83759 16.7657C1.98762 16.9157 2.1911 17 2.40327 17H7.20327M11.6033 11V16.6M8.80327 13.8H14.4033" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.4033 1V5H14.4033" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                Choice file
                            </span>
                            <!-- {{ translations.select_file }} -->
                            <input  type="file" multiple name="fields" @change="handleFileSelection"  ref="file" accept=".pdf" id="file" class="hidden" />
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-full" v-if="this.files.length && !this.submitted">
            <div class="flex flex-wrap shadow-2xl mt-4 rounded-lg p-4 w-full">
                <h3 class="w-full">Images({{this.files.length}})</h3>
                <div class="md:w-1/2 p-3 my-1 flex flex-wrap flex-row" v-for="file in files">
                    <div class="w-full flex flex-wrap flex-row justify-between gap-2  border-2 border-gray-200 rounded-md p-2  relative">
                        <div class="w-full flex flex-wrap flex-row justify-between">
                            <div class="flex flex-wrap gap-2">
                                <div>
                                <img :src="'/images/pdf_image.png'" class="rounded-lg my-2 h-5 mx-auto object-contain" style="width:40px; height: 40px;">
                                <span class="text-xs font-semibold text-blue-500 my-2">{{ file.name }}</span>
                                </div>
                                <div class="text-red-800 hover:text-red-500 flex flex-col">
                                    <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 my-2">Ready to convert</span>
                                </div>
                            </div>

                            <div class="mt-2">
                                <span class="text-blue-600">{{Math.floor(file.file.size/1024)+"KB"}}</span>
                            </div>
                            <div>
                                <button @click="remove(files.indexOf(file))" title="Remove file" class="inline-flex items-center top-1 right-1 my-2">
                                    <img :src="'images/close_button.svg'" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-wrap flex-row justify-end my-2">
                    <div class="">
                        <button @click="uploadFiles" class="w-40 p-2 my-2 text-xl bg-blue-500  font-semibold leading-tight text-white  border rounded cursor-pointer  dark:border-none hover:bg-blue-800  hover:shadow-sm">
                            Convert
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="flex flex-wrap shadow-2xl mt-4 rounded-lg p-4" v-if="this.files.length && this.submitted">
                <div class="md:w-full flex justify-between">
                    <h3>Results({{this.files.length}})</h3>
                    <button  v-if="files.length > 1" @click="downloadAllAsZip" class="py-1.5 flex px-2 me-2 mb-2 text-sm font-medium text-white border rounded-md focus:outline-none bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:ring-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="16px" width="16px" version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve" class="mt-0.5 mx-1">
                            <path style="fill:#FFFFFF;" d="M472.573,250.238c-13.664-13.664-35.818-13.664-49.482,0L290.989,382.34V45.189  c0-19.324-15.665-34.989-34.989-34.989c-19.324,0-34.989,15.665-34.989,34.989V382.34L88.91,250.238  c-13.664-13.664-35.818-13.664-49.482,0c-13.665,13.664-13.664,35.819,0,49.482l191.832,191.832  c6.832,6.832,15.786,10.248,24.741,10.248c8.955,0,17.909-3.416,24.741-10.248l191.832-191.832  C486.238,286.057,486.238,263.902,472.573,250.238z"/>
                            <g>
	                            <path style="fill:#248A9C;" d="M256,512c-12.07,0-23.417-4.7-31.953-13.235L32.214,306.933   c-8.535-8.535-13.236-19.883-13.236-31.953c0-12.071,4.7-23.418,13.236-31.954c17.619-17.619,46.287-17.618,63.907,0   l114.69,114.691V45.189C210.811,20.271,231.082,0,256,0s45.189,20.271,45.189,45.189v312.528l114.69-114.691   c17.619-17.617,46.287-17.618,63.907,0c8.535,8.536,13.236,19.883,13.236,31.954c0,12.07-4.7,23.418-13.236,31.953L287.953,498.765   C279.417,507.3,268.07,512,256,512z M64.168,250.201c-6.348,0-12.696,2.416-17.529,7.25c-4.682,4.682-7.261,10.907-7.261,17.529   c0,6.621,2.578,12.847,7.261,17.529l191.833,191.832c4.681,4.682,10.907,7.261,17.528,7.261c6.621,0,12.847-2.578,17.529-7.261   l191.832-191.832c4.682-4.682,7.261-10.908,7.261-17.529c0-6.622-2.578-12.847-7.261-17.529c-9.666-9.667-25.393-9.666-35.059,0   L298.201,389.551c-2.917,2.918-7.304,3.791-11.115,2.211c-3.811-1.579-6.296-5.297-6.296-9.423V45.189   c0-13.669-11.121-24.79-24.79-24.79c-13.669,0-24.79,11.121-24.79,24.79V382.34c0,4.125-2.486,7.844-6.296,9.423   c-3.81,1.578-8.198,0.706-11.115-2.211L81.698,257.45C76.864,252.617,70.516,250.201,64.168,250.201z"/>
                            </g>
                        </svg>
                        Download All
                    </button>
                </div>
                <div class="flex flex-wrap justify-between w-1/2 p-3 my-1" v-for="(file,index) in files" :key="index">
                    <div class="flex flex-wrap flex-row w-full justify-between  gap-2  border-2 border-gray-200 rounded-md p-2">
                        <div class="flex flex-col flex-wrap">
                            <img :src="'/images/text_image.jpg'" class="rounded-lg h-5 my-1 mx-auto object-contain" style="width: 40px; height: 40px">
                            <span class="text-xs font-semibold text-blue-500 my-1">{{ file.name }}</span>
                        </div>
<!--                        <div class="">
                            <span class="text-red-600">{{Math.floor(file.file.size/1024)+"KB"}}</span>
                        </div>-->
                        <div class="my-auto">
                            <a target="_blank" :href="file.dataURL" :download="file.downloadName" class="w-full bg-blue-500 hover:bg-blue-800 p-1 mt-1 text-white rounded">Download</a>
                        </div>
                        <div class="my-auto">
                            <button @click="remove(files.indexOf(file))" title="Remove file" class="inline-flex items-center  top-2 right-1">
                                <img :src="'images/close_button.svg'" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";
import { GlobalWorkerOptions } from "pdfjs-dist/legacy/build/pdf";
import * as docx from 'docx';
import * as pdfjsLib from 'pdfjs-dist/legacy/build/pdf';
GlobalWorkerOptions.workerSrc = '/node_modules/pdfjs-dist/build/pdf.worker.min.mjs';
import JSZip from 'jszip';

export default{
    props: {
        translations:Object,
    },
    setup() {
        const files = ref([]);
        const dragActive = ref(false);
        const submitted = ref(false);

        const handleFileSelection = (event) => {
            const newFiles = Array.from(event.target.files).map((file) => ({
                dataURL: null,  // Initially, no converted data URL
                name: file.name,
                uploading: false,
                uploaded: false,
                uploadProgress: 0,
                error: null,
                file: file,  // Store the actual File object
                downloadName: null,  // Initially, no download name
            }));

            files.value.push(...newFiles);
        };

        const uploadFiles = async () => {
            submitted.value=true;
            for (let i = 0;i<files.value.length;i++){
                await uploadFile(files.value[i]);
            }
        };

        const download =async(index) => {
            alert('download')
        };
        const remove =async(index) => {
            files.value.splice(index, 1);
            if (!files.value.length) {
                submitted.value =false;
            }
        };

        const uploadFile = async (file) => {
            const objectURL = URL.createObjectURL(file.file);

            try {
                const pdf = await pdfjsLib.getDocument(objectURL).promise;

                let pdfText = '';
                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    const page = await pdf.getPage(pageNum);
                    const textContent = await page.getTextContent();
                    const pageText = textContent.items.map(item => item.str).join(' ');
                    pdfText += `Page ${pageNum}:\n${pageText}\n\n`;
                }

                const textBlob = new Blob([pdfText], { type: 'text/plain' });
                const textURL = URL.createObjectURL(textBlob);

                // Update the file object with the conversion result
                file.dataURL = textURL;
                file.downloadName = file.name.replace(/\.[^/.]+$/, "") + ".txt";

                file.uploading = false;
                file.uploaded = true;
                file.uploadProgress = 100;

            } catch (error) {
                console.error('Error converting PDF to text:', error);
                file.error = "Error converting PDF to text";
            } finally {
                URL.revokeObjectURL(objectURL);  // Clean up the object URL
            }
        };
        const downloadAllAsZip = async () => {
            const zip = new JSZip();

            for (const file of files.value) {
                if (file.dataURL) {
                    // Convert the dataURL to a Blob
                    const response = await fetch(file.dataURL);
                    const blob = await response.blob();

                    // Use the file's download name for the ZIP entry
                    zip.file(file.downloadName, blob);
                }
            }

            const zipBlob = await zip.generateAsync({ type: 'blob' });

            // Create a URL for the Blob
            const url = URL.createObjectURL(zipBlob);

            // Create a temporary anchor element
            const a = document.createElement('a');
            a.href = url;
            a.download = 'converted_files.zip';

            // Append the anchor to the body (not visible)
            document.body.appendChild(a);

            // Programmatically click the anchor to trigger the download
            a.click();

            // Remove the anchor from the document
            document.body.removeChild(a);

            // Revoke the Blob URL to release memory
            URL.revokeObjectURL(url);
        };


        const dragover = async () => {
            dragActive.value = true;
        };
        const dragleave = async (event) => {
            dragActive.value = false;
        };
        const dropFile = (event) => {
            event.preventDefault();
            dragActive.value=false;
            const newFiles = Array.from(event.dataTransfer.files).map((file) => ({
                dataURL:URL.createObjectURL(file),
                name:file.name,
                uploading: false,
                uploaded: false,
                uploadProgress: 0,
                error: null,
                file: file, // Store the actual File object
            }));

            files.value.push(...newFiles);
        };
        return {
            dragover,
            dragleave,
            dropFile,
            remove,
            dragActive,
            submitted,
            files,
            handleFileSelection,
            uploadFiles,
            downloadAllAsZip,
        };
    },
};

</script>
<style scoped>
.flex-grow {
    flex-grow: 1;
}
</style>
