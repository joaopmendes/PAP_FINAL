<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test if the page /blog is return code 200 (success)
     *
     * @return void
     */
    public function test_if_blog_page_is_returning_200()
    {
        $response = $this->get(route('blog.index'));
        $response->assertStatus(200);
    }
    /**
     * Test when creating a post he shows up at the first page
     *
     * @return void
     */
    public function test_if_creating_a_post_it_shows_at_the_first_page()
    {

        $blog = factory(\App\Blogpost::class)->create();
        $response = $this->get(route('blog.index'));
        $response->assertStatus(200);
        $response->assertSeeInOrder([
            $blog->title,
            $blog->message
        ]);
    }
    /**
     * Searching for one blog if it fetchs the blog
     *
     * @return void
     */
    public function test_if_searching_for_a_post_it_returns_the_right_one()
    {

        $blog = factory(\App\Blogpost::class)->create();
        $this->followingRedirects()
                         ->post(route('search_post'), ['search_string' => $blog->title])
                         ->assertSeeInOrder(
                            [
                                $blog->title,
                                $blog->message,

                            ]
                         );
    }

}
