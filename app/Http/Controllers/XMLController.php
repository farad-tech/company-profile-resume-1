<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class XMLController extends Controller
{

    public function pages()
    {
        $static_pages = [
            ['1.0', route('home')],
            ['0.95', route('about-us')],
            ['0.95', route('services')],
            ['0.95', route('projects')],
            ['0.95', route('our-team')],
            ['0.95', route('contact-us')],
            ['0.95', route('blogs')],
        ];

        $keywords_pages = [];
        $blogs = Blog::get();
        foreach ($blogs as $blog) {
            $new_page = ['0.9', route('blog', str_replace(' ', '-', $blog->title))];
            array_push($static_pages, $new_page);
            
            foreach ($blog->keywords as $keyword) {
                $new_keyword_page = ['0.85', route('blogSearch', str_replace(' ', '-', $keyword))];
                array_push($keywords_pages, $new_keyword_page);
            }
        }

        $blog_catgories = BlogCategory::get();
        foreach ($blog_catgories as $category) {
            $new_page = ['0.9', route('blog', str_replace(' ', '-', $category->title))];
            array_push($static_pages, $new_page);
        }

        $static_pages = array_merge($static_pages, $keywords_pages);

        return $static_pages;
    }

    public function index()
    {

        $xw = xmlwriter_open_memory();
        xmlwriter_set_indent($xw, 1);
        xmlwriter_set_indent_string($xw, ' ');

        xmlwriter_start_document($xw, '1.0', 'UTF-8');

        // A first element
        xmlwriter_start_element($xw, 'urlset');

        // Attribute for urlset
        xmlwriter_start_attribute($xw, 'xmlns');
        xmlwriter_text($xw, 'http://www.sitemaps.org/schemas/sitemap/0.9');
        xmlwriter_end_attribute($xw);

        // Attribute for urlset
        xmlwriter_start_attribute($xw, 'xmlns:xsi');
        xmlwriter_text($xw, 'http://www.w3.org/2001/XMLSchema-instance');
        xmlwriter_end_attribute($xw);

        // Attribute for urlset
        xmlwriter_start_attribute($xw, 'xsi:schemaLocation');
        xmlwriter_text($xw, 'http://www.w3.org/2001/XMLSchema-instance http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
        xmlwriter_end_attribute($xw);

        // Start a child element, parnet = urlset
        foreach ($this->pages() as $page) {
            xmlwriter_start_element($xw, 'url');

            xmlwriter_start_element($xw, 'loc');
            xmlwriter_text($xw, $page[1]);
            xmlwriter_end_element($xw);

            xmlwriter_start_element($xw, 'lastmod');
            xmlwriter_text($xw, Carbon::now('GMT')->format('Y-m-d\Th:m:s') . '+00:00');
            xmlwriter_end_element($xw);

            xmlwriter_start_element($xw, 'priority');
            xmlwriter_text($xw, $page[0]);
            xmlwriter_end_element($xw);

            xmlwriter_end_element($xw);
        }

        // End urlset element
        xmlwriter_end_element($xw);

        xmlwriter_end_document($xw);

        return response(xmlwriter_output_memory($xw), 200)->header('Content-Type', 'application/xml');
    }
}
