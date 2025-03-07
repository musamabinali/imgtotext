<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Blog2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogArr = ['feature_img' => 'pdftojpg.jpg', 'slug' => 'reasons-to-convert-PDF-to-JPG', 'user_id' => 1, 'created_at' => '2021-12-11 07:46:46', 'updated_at' => now()];
        $blogDetailArr = [
            'title' => 'What are the Reasons to convert PDF to JPG?',
            'short_description' => 'PDF is considered one of the safest file formats for file sharing. It is believed as the ideal format for uploading a file across the internet without any complexities.It converts quickly and has...',
            'long_description' => '
            <p class="mb-0 py-2" style="font-size: 16px;">PDF is considered one of the safest file formats for file sharing. It is believed as the ideal format for uploading a file across the internet without any complexities. It converts quickly and has an easy-to-use interface. Understandably, when using an online tool you should be concerned about its safety. The fact is, most of the files and documents  you upload can contain sensitive information. With that in mind, WowPDF makes data protection one of its top priorities in providing its service. </p>
            <p class="mb-0 py-2" style="font-size: 16px;">Wwow.PDF can guarantee the privacy and security of its users and their documents. This encryption should be able to protect you and your files  from the wrong hands.</p>
            <p class="mb-0 py-2" style="font-size: 16px;">Wow.PDF makes it easy to convert PDF to JPG anytime, anywhere, as it is an easily accessible web tool. All you need is a stable internet connection to access it. </p>
            <p class="mb-0 py-2" style="font-size: 16px;">You do not need to spend so much time and effort converting PDF to JPG. This PDF to JPG converter takes care of everything during the conversion process. In return, you can simply take off a load  while this online converter works like magic as it will convert the photos or images in your PDF to JPG in no time. </p>
            <h3 class="font-weight-bold py-4 mb-0">Here are the reasons why you need to convert your pdf files to jpg format :-</h3>
            <h4 class="font-weight-bold py-4 mb-0">For website integration:</h4>
            <p class="mb-0 py-2" style="font-size: 16px;">PDF files cannot be published directly to blogs and websites. If you want a snapshot of your PDF document to be  on your blog or website, you need to convert it to an image file, e.g. PNG or JPG. </p>
            <h4 class="font-weight-bold py-4 mb-0">Privacy Protection:</h4>
            <p class="mb-0 py-2" style="font-size: 16px;">Data privacy and file security are a major concern for obvious reasons such as virus attacks and plagiarism. Our wow.PDF to JPG Converter will help you to convert and download files to ensure your data security is not compromised. As a result, the converted files are safe and protected from online threats.</p>
            <h4 class="font-weight-bold py-4 mb-0">Wait one second: </h4>
            <p class="mb-0 py-2" style="font-size: 16px;">Waiting one second for PDF conversion to complete should not be too bad. After all, other online tools can not even produce high quality and accurate conversions. With the WowPDF, PDF to JPG tool, it only takes 1 second to get the required PDF to JPG file. 
            WowPDF PDF to JPG tool allows users to easily and smoothly convert  files to JPG. This tool  also works with files other than JPG. This fact allows users  to use converters to convert PDF documents to jpg, and other image file formats. </p>
            <h4 class="font-weight-bold py-4 mb-0">Decrease the size of a PDF:</h4>
            <p class="mb-0 py-2" style="font-size: 16px;">PDF files are bigger than JPG files in general. So, if you want to decrease the file size of your PDF document, use PDF to JPG converter. Your computer or usb will now have more space. </p>
            <h4 class="font-weight-bold py-4 mb-0">To use as a desktop background: </h4>
            <p class="mb-0 py-2" style="font-size: 16px;">You may be looking for magazine articles in PDF format, and by chance you come across a good image that you want to use as your desktop background. To use the PDF image as a background image, you must convert it to PNG, TIF, or any other image format. </p>
            <h4 class="font-weight-bold py-4 mb-0">Third Party:</h4>
            <p class="mb-0 py-2" style="font-size: 16px;">If you don not have a third-party program to view your PDF files, The only option for you is to convert  PDF files to JPG.
            Thats why you need to convert PDF files to JPG format.</p>
            <h4 class="font-weight-bold py-4 mb-0">Conclusion:</h4>
            <p class="mb-0 py-2" style="font-size: 16px;">Considering  the above reasons, PDF to JPG Converter is a must not only for web designers but also for everyone like you and me.</p>








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