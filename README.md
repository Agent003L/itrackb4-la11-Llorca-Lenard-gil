# Laboratory Activity 6: Two Filters, One Route

## Q1

I did not need a new route because the router only looks at the path, such as `/movies`, when choosing the route. The `genre` and `year` values are query-string data attached after the path. The existing `movies.index` route therefore handles the unfiltered list and every filtered version.

## Q2

If both filters were route parameters, a year-only URL would need a placeholder for the missing genre, such as `/movies/genre/year/4` or another specially designed route shape. That would require more route definitions or awkward placeholder values. Query strings are simpler because `year=2014` can be supplied without inventing a missing genre value.

## Q3

The navigation pattern needed to account for the longer detail path so the Movies link remains active on `/movies/2`. The filtered list needed no separate pattern change because its path is still `/movies`; only its query string changes. Checking the current path therefore keeps the same navigation item marked when a filter is applied.

## Q4

The old filter method was replaced by the index method, so leaving it would create a second dead filtering implementation. I kept the empty `store` and `update` methods because they represent unfinished resource actions that will be implemented later. The old filter view was also deleted because the redirect now sends visitors to the index page instead of rendering it.


