<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Blog4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogArr = ['feature_img' => 'improve.jpg', 'slug' => 'benefits-of-online-PDF-Converter', 'user_id' => 1, 'created_at' => '2021-10-11 07:46:46', 'updated_at' => now()];
        $blogDetailArr = [
            'title' => 'Top Significant Benefits of Wow PDF Converter',
            'short_description' => 'In today s modern business world, PDF is used as a universal format for storing important data. Today, many companies use and rely on paperless invoices and records, even sending invoices to their customers... ',
            'long_description' => '<p class="mb-0 py-2" style="font-size: 16px;">In todays modern business world, PDF is used as a universal format for storing important data. Today, many companies use and rely on paperless invoices and records, even sending invoices to their customers in this PDF format. In fact, e-commerce-based companies with employees across the country can  use most of this type of portable document file. 
             PDF is essential for digital businesses to quickly share project information and ensure team-wide collaboration. And with the best PDF converters, you can easily and productively perform your daily tasks. Here is how a PDF converter can help your entire digital business.</p>
             <h2 class="font-weight-bold py-4">What is a PDF converter?</h2>
             <p class="mb-0 py-2" style="font-size: 16px;"> There are numerous PDF readers available on the internet that are free applications that help you open and view PDF documents. However, you need something more sophisticated to actually make changes to the PDF file.Our wow PDF converter tool for converting files from DOC to PDF, XLS to PDF, PPT to PDF, Merge PDF, and vice versa.</p>
             <p class="mb-0 py-2" style="font-size: 16px;">This wow PDF converter takes your modification or editing tools to the next level. You can automatically convert PDF files to other file formats you need and vice versa. This is possible with common business software. Convert PDF  to DOCX so that you can open the document directly in Microsoft Word. </p>
             <p class="mb-0 py-2" style="font-size: 16px;">You can also use other tools  to convert PDF tables to Excel  tables. If you need to compress the image to a smaller file size for email purposes, there is also an accessibility tool PDF to JPEG option. The PDF converter allows you to choose the best format for modifying or editing your data in your favorite program.</p>
             <p class="mb-0 py-2" style="font-size: 16px;">If you are using PDF digitally, the wow PDF Converter is a great tool to do all your work in a short amount of time. You are probably using a PDF reader now. However, this type of application is not sufficient for the e-commerce business. Its best to use a document converter that has a lot of useful features to do the job for you.</p>
             <h2 class="font-weight-bold py-4 mb-0">Some of the main benefits of using this wow pdf converter are:</h2>            
             <h4 class="font-weight-bold py-4 mb-0">1. Document format is preserved:</h4>
             <p class="mb-0 py-2" style="font-size: 16px;">One of the problems with sharing documents created in Microsoft Word or other file formats is that when sharing files from one computer to the next, the formats can  be very different. This can be confusing and can make clients and colleagues look unattractive. Rest assured that the PDF format will display the document  exactly as it was created. It is also ideal for sending documents  to be printed.</p>
             <h4 class="font-weight-bold py-4 mb-0">2. The format is everywhere: </h4>
             <p class="mb-0 py-2" style="font-size: 16px;">PDF is so good at its original purpose that it  has become widely used around the world. This format is easy to read and easy to share. Therefore, even if you share your document with someone on the other side of the world , sending a PDF is a safe choice.</p>
             <h4 class="font-weight-bold py-4 mb-0">3. Secure data storage:</h4>
             <p class="mb-0 py-2" style="font-size: 16px;">You can use the PDF Converter tool to instantly convert Word and Excel documents to PDF files and vice versa. PDF provides excellent security for sensitive data. This allows users to save, modify, and share files in the best possible way. This is the best way to keep a physical or paper document in digital format for longer.</p>
             <h4 class="font-weight-bold py-4 mb-0">4. Easier paper-to-digital conversion:</h4>
             <p class="mb-0 py-2" style="font-size: 16px;">Easier paper-to-digital conversion If you just want to insert all the  paper documents into your digital storage system, the PDF converter makes your work much faster and easier. capture  content instantly, so you can quickly step into the digital era as you would expect.</p>
             <h4 class="font-weight-bold py-4 mb-0">5. Multiple format options:</h4>
             <p class="mb-0 py-2" style="font-size: 16px;">PDF files are versatile and  support all operating systems and hardware. They are universally compatible, so you will need  them in PDF format. However, PDF readers do not always allow you to change the format or use rich text. Here you can convert PDF to Word online and make the necessary changes to your documents on the go.</p>
             <h4 class="font-weight-bold py-4 mb-0">6. Efficient document processing: </h4>
             <p class="mb-0 py-2" style="font-size: 16px;">Convert PNG, PPT, Docx, Doc, JPEG, merge Word and convert to PDF. Make the necessary changes in the most efficient way possible. You can work quickly and  efficiently. Sure! Just convert the file to PDF and you will see the difference.</p>
             <h4 class="font-weight-bold py-4 mb-0">7. It is unlikely that it will disappear: </h4>
             <p class="mb-0 py-2"  style="font-size: 16px;">Technology is advancing rapidly, but PDF can exist in the long run. This format is so popular and has a very long history  that it will require radical changes in the computing world to adopt another standard. Investing in PDF software  is rewarding in the long run and gives your enterprise a good return on investment.</p>
             <h2 class="font-weight-bold py-4 mb-0">Final Thoughts:</h2>
             <p class="mb-0 py-2"  style="font-size: 16px;">Providing resources with a PDF converter is  a very wise way for  digital businesses as it saves time and money. If you can make quick changes  to  your PDF, your company can spend less time on basic tasks. By doing so, the team can focus more  on providing excellent customer support. Also, whether you have signed a contract or need to modify a  long report, the advantage of the PDF converter is that it can significantly reduce your workload.</p>
              
              
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
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