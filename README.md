# LA10: Your Own Lookup Table

## G1: Lookup table

I turned `genre` into its own `genres` table. A movie's genre comes from a fixed list, values like Sci-Fi and Animation repeat across several movies, and a genre could later get details of its own. Columns like `year` and `is_watched` are just values, not things.

## G2: Screenshot 6

Screenshot 6 showed 9 queries for my 8 movies. The page ran 1 query to load the movies, then 1 extra query per movie to fetch its genre name, which is 1 + 8. After adding `with('genre')`, it dropped to 2.

## G3: Plural belongsTo

Eloquent builds the foreign key column name from the method name. If `genre()` were named `genres()`, it would look for a `genres_id` column in `movies`, which doesn't exist, and `$movie->genre->name` in my views would fail because there would be no `genre` relationship.