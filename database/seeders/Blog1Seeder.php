<?php

namespace Database\Seeders;
use App\Models\Blog;
use Illuminate\Database\Factories\BlogDetailFactory;
use Illuminate\Database\Seeder;

class Blog1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogArr = ['feature_img' => 'jpgtopdffeacherimage.webp', 'slug' => 'convert-excel-spreadsheet-to-PDF-online', 'user_id' => 1, 'created_at' => '2021-12-11 07:46:46', 'updated_at' => now()];
        $blogDetailArr = [
            'title' => 'How to convert excel spreadsheet into jpg online:',
            'short_description' => 'Make excel tables easy to read by converting them to PDF. The most popular online tool to quickly convert your Microsoft Excel spreadsheets into PDF documents for easy sharing and saving.',
            'long_description' => ' <p class="py-2 text-red-500 mb-0" style="font-size:30px;">Make excel tables easy to read by converting them to jpg. The most popular online tool to quickly convert your Microsoft Excel spreadsheets into PDF documents for easy sharing and saving.
            Convert excel spreadsheet files to PDF files online from your phone and desktop.</p>
            <h2 class="font-weight-bold">How to Convert Excel to PDF Online: </h2>
            <ul class="p-3">
            <li>Upload your file into the Excel to PDF converter.
            </li>
            <li> Wait for the tool to save the table in PDF format.
            </li>
            <li> Change the output file on the results page if necessary.
            </li>
            <li class="py-1"> Otherwise, download, share, or save the file in your systems.
            </li>
            </ul>
            <p class="py-2">Our free Excel to PDF converter will quickly convert all your files. Not only is it easy to use,  our Excel to PDF converter will convert your Excel spreadsheet with tables and formulas to PDF perfectly. </p>
            <p class="py-3">No plugins or extensions required. Our editor and converter works completely online. If you have internet access, you can use free PDF converters and file editing tools.  All you need is an internet connection.
            Instead of converting one PDF at a time, use our desktop excel to PDF converter to convert many documents at the same time.</p>
            <h3 class="font-weight-bold py-4">Why convert Excel to PDF? </h3>
            <h4 class="font-weight-bold py-2 mb-0"> Universal Display: </h4>
            <p class="py-2 mb-0" style="font-size: 16px;">One of the advantages of  PDF format is its universality. PDFs always look the same, regardless of the device or operating system used to display them. Therefore, when you convert Excel to PDF, everyone who sends this report, invoice, or chart  will be able to see it as intended. </p>
            <h4 class="font-weight-bold py-2 mb-0">Document security: </h4>
            <p class="py-2 mb-0" style="font-size: 16px;">Documents such as financial reports, invoices, and budget planning documents usually contain sensitive corporate and personal information. When converting these documents from Excel to PDF, you can set password protection and restrict permissions to protect this information  from the outside world.</p>

            <h3 class="font-weight-bold py-4 mb-0">Why do we use this tool?</h3>
            <p class="py-2 mb-0" style="font-size: 16px;">One of the main reasons to use this tool is that the PDF document is a universal file format. It looks the same when viewed by different people on different devices. </p>
            <p class="py-2 mb-0" style="font-size: 16px;">When you convert your Excel to PDF,  so if you edit the content of a table, the results from previous calculations on Excel will not change.</p>
            <p class="py-2 mb-0" style="font-size: 16px;">Convert scanned and digital documents from excel to PDF with just two clicks. It is very easy and works in seconds.</p>
            <p class="py-2 mb-0" style="font-size: 16px;">We do not store your information and we do not store your data. So you can relax knowing that your personal documents and privacy are protected. </p>
            <p class="py-2 mb-0" style="font-size: 16px;">All files on our server are secure. We also will not share or sell any information that is available to us with third parties.</p>
            <h3 class="font-weight-bold py-4 mb-0">Impressive, But How Is This Tool Free?</h3>
            <p class="py-2 mb-0" style="font-size: 16px;"> Our online website came from the need to reduce issues related to digital documents, particularly the PDF format. File size cap is currently at 20MB per document.</p>
            <p class="py-2 mb-0" style="font-size: 16px;">The standard website is free for limited use. We believe that anyone should be able to solve simple PDF related issues. Online conversion for multiple XLSX to PDF can be done in less than a minute.</p>
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
