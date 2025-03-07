<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Blog3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogArr = ['feature_img' => 'combine.jpg', 'slug' => 'combine-PDF-documents-with-online-tool', 'user_id' => 1, 'created_at' => '2021-12-11 07:46:46', 'updated_at' => now()];
        $blogDetailArr = [
            'title' => 'How to combine PDF documents with wowpdf? ',
            'short_description' => 'Joining or merging documents is a very popular feature, and you can not stop it. You can now merge PDF files quickly and easily. The first step in quickly combining 
            documents to make sure that the wowpdf...',
            'long_description' => '<p class="mb-0 py-2" style="font-size: 16px;">Joining or merging documents is a very popular feature, and you can not stop it. You can now merge PDF files quickly and easily. The first step in quickly combining 
            documents to make sure that the wowpdf (online or desktop) is already open.</p>
            <p class="mb-0 py-2" style="font-size: 16px;">Our online wowPDF combiner is the best solution for combining two or more PDF files for free. There are also  useful productivity tools It provides a secure and reliable solution for easy manipulation of PDF documents.</p>            
            <p class="mb-0 py-2" style="font-size: 16px;">As with online PDF merging, other online PDF converters are free to use. With our tool suite, you can rotate PDF, add PDF to PDF online for free. You can access these tools for free.</p>
            <h2 class="font-weight-bold py-3">How to Merge PDF files?</h4>
            <ul class="p-3" style="font-size: 16px;">
            <li class="py-1">Click Upload and select the file from your local computer. </li>
            <li class="py-1">Therefore, make sure that the correct PDF file has been uploaded and select a specific page area for that file to combine with the current PDF.</li>
            <li class="py-1">Drag and drop the files to change the merge order.</li>
            <li class="py-1">Need a mixed page to switch between two files.</li>
            <li class="py-1">You can customize how pages added to the PDF are merged.</li>
            <li class="py-1">Click, Download and to save the merged PDF file to your computer.</li>
            </ul>
            <p class="mb-0 py-2" style="font-size: 16px;">Once the web based solution is open and accessible, its time to combine it. 
            Easily manage your documents with wowPDF. Our PDF merge tool is an online tool and our service offers. 
            Whether you are looking for a quick one-click online tool for a simple document task, or a full-featured desktop and online solution for work, school, or business, wowPDF sets your document goals right away. Helps to achieve. Edit,add PDFs and  more!</p>
            <p class="mb-0 py-2" style="font-size: 16px;">It works on all operating systems. Regardless of your operating system or device, if you have an internet connection and  a device that allows you to upload and download files through a server,  you can  combine PDF files  with online PDF merging in seconds. This means you can use  free PDF joiners and other tools on any device,  anywhere.</p>
            <p class="mb-0 py-2" style="font-size: 16px;">All PDFs and other files that pass through the PDF combiner are encrypted. This is to ensure that all information processed during the  download is protected from threats such as hacker attacks. In addition, we do not share or sell your information or data with third parties. </p>
            <p class="mb-0 py-2" style="font-size: 16px;">Protecting sensitive data  is our priority. After the PDF files have been merged, the files will continue to be available on the server for 5 minutes. There is enough time to download and save the merged PDF. Later, the online PDF merge tool will automatically delete the remaining files from the server to protect your information.</p>
            <h2 class="font-weight-bold py-3">So when do you use it? </h2>
            <p class="mb-0 py-2" style="font-size: 16px;">The PDF Merge Tool has a myriad of uses. Imagine you need to share a 
            PDF file with another department in your workplace. Its much easier to combine all  the PDF files into one  file for easy sharing. 
            Or suppose you are a  student working on a group assignment with your friends. We will return the PDF after everyone has finished their work individually. You need to find a way to combine all the PDF files. You are heading in the right direction, you can easily use our merge tool.</p>
            <h2 class="font-weight-bold py-3">Benefits of combining PDF files:</h2>
            <ol class="px-3" style="font-size: 16px;">
            <li class="py-1">Keeping all your data in one place Processing a large number of PDF documents is a complex task. By combining them, users can save all their data in one document and manage their work easily. </li>
            <li class="py-1">Easy to manage and share-Sharing a single PDF file with your teammates and friends is  easier than sharing multiple PDF files at the same time. Combining multiple PDF files into one PDF file reduces the time it takes to send and receive.</li>
            <li class="py-1">Overcoming File Processing Issues-If you have multiple PDF files, you will experience file processing issues or data corruption. PDF files may be accidentally deleted or moved. The best solution to  avoid this situation  is to combine multiple PDF files into one.</li>
            </ol>
            
           '
        ];
        $Blog = \App\Models\Blog::whereSlug($blogArr['slug'])->first();

        if ($Blog) {
            \App\Models\Blog::whereId($Blog->id)->update($blogArr);
            \App\Models\BlogDetail::whereBlogId($Blog->id)->update($blogDetailArr);

        } else {
            $BlogNew = \App\Models\Blog::factory(1)->create($blogArr);
            $ContentTool = \App\Models\BlogDetail::factory(1)->create(array_merge($blogDetailArr, ['blog_id' => $BlogNew[0]->id, 'user_id' => $BlogNew[0]->user_id]));
        }
    }
}