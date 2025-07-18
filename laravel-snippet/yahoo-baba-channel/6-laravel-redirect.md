# laravel-redirect
In Laravel, you can redirect users to different routes or URLs using the `redirect` helper or the `Route::redirect` method. `redirect()` is used for simple redirects, while `Route::redirect` provides a shorthand for redirecting to a specific URI. You can also redirect to named routes, controller actions, or external websites. 

# 1. Using the `redirect` helper:
[To a specific URL: redirects to the /home route within your application. ]
```
return redirect('/home'); 
```

[To the previous page: redirects back to the page the user came from. ]
```
return redirect()->back();
```

[To a named route: redirects to the route named 'profile', passing an ID parameter. ]
```
return redirect()->route('profile', ['id' => 1]); 
```


[To a controller action: redirects to the index method of the MyController. ]
```
return redirect()->action([MyController::class, 'index']);
```

[To an external URL: redirects to an external website. ]
```
return redirect()->away('https://www.google.com'); 
```

# 2. Using `Route::redirect`
[redirects users from /here to /there.]
```
Route::redirect('/here', '/there'); 
```

[redirects from /from to /to with a 302 (temporary) redirect. You can specify the status code as the third parameter. ]
```
Route::redirect('/from', '/to', 302);
```

# 3. Redirecting with data (flash data):

[redirects to the root and adds a flash message to the session. Flash data is automatically available in the next request. ]
```
return redirect('/')->with('message', 'Welcome!');
```
 
# 4. Redirecting to a named route with parameters:

[redirects to the profile route with an ID parameter.]
```
return redirect()->route('profile', ['id' => 1]);
```

[redirects with an array of parameters. ]
```
return redirect()->route('profile', $parameters);
```

# 5. Redirecting with input data after validation:

[redirects back to the previous page and keeps the input data from the request.]
```
return redirect()->back()->withInput(); 
```

[includes all the input data from the request. ]
```
return redirect()->back()->withInput(Input::all()); 
```

# 6. Redirecting to an external URL:

[redirects to Google]
```
return redirect()->away('https://www.google.com'); 
```

[is another way to redirect to an external URL. ]
```
return redirect()->to('https://www.google.com');
```

# 7. Redirecting to an anchor (hash) on the same page:

[redirects to the home page and scrolls to the "comments" section.]
```
return redirect('/')->withFragment('comments'); 
```

[achieves the same result as the previous example. ]
```
return redirect('/#comments'); 
```
