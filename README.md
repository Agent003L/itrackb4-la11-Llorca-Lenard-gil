# LA9: Your Own Table, Your Own Model

## F1: Nullable column

I made `notes` the nullable column in my `movies` table. A movie is still a complete record with just a title, director, genre, year and watched status, and not every movie needs a personal comment. The other columns are what my list page, filters and detail page depend on, so leaving any of them empty would break the display.

## F2: First failure

The first step that failed was `php artisan migrate`, with the error `SQLSTATE[HY000]: General error: 1 table "movies" already exists`. A `movies` table was already in my `database.sqlite` from earlier work, so Laravel refused to create it a second time. I fixed it by clearing the old table with `php artisan migrate:fresh` and running my migration again. Later, adding `$fillable` was prompted by the expected `MassAssignmentException` in Tinker.

## F3: Why the Blade files still work

The Blade files never read the JSON file or the database. They only receive variables from the controller (`$movies`, `$genres`, `$years`, `$activeGenre`, `$activeYear`) and read properties like `title`, `genre` and `year` from each item. Since my table uses the same column names as the old JSON keys and the controller passes the same variable names, the Blade files can't tell the data now comes from the Eloquent `Movie` model.