<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MovieRoutesTest extends TestCase
{
    use WithoutMiddleware;

    public function test_index_route_works(): void
    {
        $response = $this->get(route('movies.index'));

        $response->assertStatus(200);
        $response->assertSee('My Movies List');
        $response->assertSee('Inception');
        $response->assertSee('The Godfather');
    }

    public function test_index_route_filters_by_genre(): void
    {
        $response = $this->get(route('movies.index', ['genre' => 'Sci-Fi']));

        $response->assertSee('Inception');
        $response->assertDontSee('The Godfather');
    }

    public function test_index_route_filters_by_year(): void
    {
        $response = $this->get(route('movies.index', ['year' => 2014]));

        $response->assertSee('Interstellar');
        $response->assertDontSee('Inception');
    }

    public function test_index_route_filters_by_genre_and_year(): void
    {
        $response = $this->get(route('movies.index', ['genre' => 'Sci-Fi', 'year' => 2014]));

        $response->assertSee('Interstellar');
        $response->assertDontSee('Inception');
        $response->assertDontSee('The Matrix');
    }

    public function test_index_route_shows_filter_links_and_active_filters(): void
    {
        $response = $this->get(route('movies.index', ['year' => 2014]));

        $response->assertSee('Active filters:');
        $response->assertSee('Year: 2014');
        $response->assertSee('genre=Sci-Fi&amp;year=2014', false);
        $response->assertSee('Clear filters');
        $response->assertSee(route('movies.index'), false);
    }

    public function test_featured_route_works(): void
    {
        $response = $this->get(route('movies.featured'));

        $response->assertStatus(200);
        $response->assertSee('Featured Movie');
    }

    public function test_detail_route_shows_correct_item(): void
    {
        $response = $this->get(route('movies.show', ['id' => 2]));

        $response->assertStatus(200);
        $response->assertSee('The Dark Knight');
    }

    public function test_missing_detail_route_throws_404(): void
    {
        $response = $this->get(route('movies.show', ['id' => 999]));

        $response->assertStatus(404);
    }

    public function test_old_filter_route_without_value_redirects_to_index(): void
    {
        $response = $this->get(route('movies.filter'));

        $response->assertRedirect(route('movies.index'));
    }

    public function test_old_filter_route_redirects_with_genre_query(): void
    {
        $response = $this->get(route('movies.filter', ['value' => 'Sci-Fi']));

        $response->assertRedirect(route('movies.index', ['genre' => 'Sci-Fi']));
    }

    public function test_movie_navigation_is_active_on_list_detail_and_filtered_pages(): void
    {
        $this->get(route('movies.index'))
            ->assertSee('<li class="active">', false);

        $this->get(route('movies.show', ['id' => 2]))
            ->assertSee('<li class="active">', false);

        $this->get(route('movies.index', ['genre' => 'Sci-Fi']))
            ->assertSee('<li class="active">', false);
    }
}
