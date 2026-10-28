# LA11: Finish Your Own CRUD

## G1: Route model binding

Binding needs two things: the controller parameter is type-hinted with the model (`Movie $movie`), and its name matches the route segment `{movie}`. With the type-hint but a wrong name, Laravel can't match a record and hands my method an empty `Movie` object, so my edit form opens blank. With the right name but no type-hint, I only get the raw id from the URL, not a record.

## G2: Delete link

My Delete link goes to `/movies/{id}`, which is the right address, but a link can only send a GET request. In my project that address answered as the show route, not destroy, because destroy only answers the DELETE verb. I needed a form with `@method('DELETE')` to send the correct verb.

## G3: old() second argument

On my edit form, `old('title', $movie->title)` shows the typed value after a failed submit, and the saved value otherwise. Without the second argument, the form opens empty, as in my screenshot 3. With only the second argument (no `old()`), a rejected edit would throw away what I typed and bring back the original title.