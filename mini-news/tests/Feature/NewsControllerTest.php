<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\News;
use App\NewsType;

class NewsControllerTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_news()
    {
        $news = factory(News::class)->make()->toArray();
        $newstype = factory(NewsType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/v1/create', $news
        );

        $this->assertApiResponse($news);
    }



 /**
     * @test
     */

    public function test_read_news()
    {
        $news = factory(News::class)->create()->toArray();

        $this->response = $this->json(
            'GET',
            '/api/v1/news/'.$news['id']
        );

        $this->response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_read_all_news()
    {
        $news = factory(News::class)->create()->toArray();

        $this->response = $this->json(
            'GET',
            '/api/v1/news'
        );

        $this->response->assertStatus(200);

    }

    /**
     * @test
     */
    public function test_update_news()
    {
        $news = factory(News::class)->create()->toArray();
        $editednews = factory(News::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/news/'.$news['id'],
            $editednews
        );

        $this->response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_delete_news()
    {
        $news = factory(News::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/v1/news/'.$news->id
         );

        $this->assertApiDeleted();
        $this->response = $this->json(
            'GET',
            '/api/v1/news/'.$news->id
        );

        $this->response->assertStatus(200);
    }


}
