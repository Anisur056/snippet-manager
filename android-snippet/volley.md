# Volley Library in Android

Volley is an HTTP library that makes networking very easy and fast, for Android apps. It was developed by Google and introduced during Google I/O 2013. It was developed because there is an absence in Android SDK, of a networking class capable of working without interfering with the user experience. Although Volley is a part of the Android Open Source Project(AOSP), Google announced in January 2017 that Volley will move to a standalone library. It manages the processing and caching of network requests and it saves developers valuable time from writing the same network call/cache code again and again. Volley is not suitable for large download or streaming operations since Volley holds all responses in memory during parsing. 

## Features of Volley:

Request queuing and prioritization,
Effective request cache and memory management,
Extensibility and customization of the library to our needs,
Cancelling the requests,

## Advantages of Using Volley:
All the tasks that need to be done with Networking in Android, can be done with the help of Volley,
Automatic scheduling of network requests,
Catching,
Multiple concurrent network connections,
Cancelling request API,
Request prioritization,
Volley provides debugging and tracing tools,

# how to Import Volley and Add Permissions
Before getting started with Volley, one needs to import Volley and add permissions in the Android Project. The steps to do so are as follows:

Create a new project. Open build.gradle(Module: app) and add the following dependency:
```
dependencies{ 
    //...
    implementation 'com.android.volley:volley:1.0.0'
}
```

## AndroidManifest.xml add the internet permission:
```
<uses-permission android:name="android.permission.INTERNET" />
```

# String Request 
```
String url = "https:// string_url/"; 
StringRequest 
    stringRequest 
    = new StringRequest( 
        Request.Method.GET, 
        url, 
        new Response.Listener() { 
            @Override
            public void onResponse(String response) 
            { 
            } 
        }, 
        new Response.ErrorListener() { 
            @Override
            public void onErrorResponse(VolleyError error) 
            { 
            } 
        }); 
requestQueue.add(stringRequest);
```

# JSONObject Request 
```
String url = "https:// json_url/"; 
JsonObjectRequest 
    jsonObjectRequest 
    = new JsonObjectRequest( 
        Request.Method.GET, 
        url, 
        null, 
        new Response.Listener() { 
            @Override
            public void onResponse(JSONObject response) 
            { 
            } 
        }, 
        new Response.ErrorListener() { 
            @Override
            public void onErrorResponse(VolleyError error) 
            { 
            } 
        }); 
requestQueue.add(jsonObjectRequest);
```


# JSONArray Request 
```
JsonArrayRequest 
	jsonArrayRequest 
	= new JsonArrayRequest( 
		Request.Method.GET, 
		url, 
		null, 
		new Response.Listener() { 
			@Override
			public void onResponse(JSONArray response) 
			{ 
			} 
		}, 
		new Response.ErrorListener() { 
			@Override
			public void onErrorResponse(VolleyError error) 
			{ 
			} 
		}); 
requestQueue.add(jsonArrayRequest);
```

# Image Request 
```
int max - width = ...; 
int max_height = ...; 

String URL = "http:// image_url.png"; 

ImageRequest 
	imageRequest 
	= new ImageRequest(URL, 
					new Response.Listener() { 
						@Override
						public void
						onResponse(Bitmap response) 
						{ 
							// Assign the response 
							// to an ImageView 
							ImageView 
								imageView 
								= (ImageView) 
									findViewById( 
										R.id.imageView); 

							imageView.setImageBitmap(response); 
						} 
					}, 
					max_width, max_height, null); 

requestQueue.add(imageRequest); 

```

# Adding Post Parameters
```
String tag_json_obj = "json_obj_req"; 

String 
	url 
	= "https:// api.xyz.info/volley/person_object.json"; 

ProgressDialog pDialog = new ProgressDialog(this); 
pDialog.setMessage("Loading...PLease wait"); 
pDialog.show(); 

JsonObjectRequest 
	jsonObjReq 
	= new JsonObjectRequest( 
		Method.POST, 
		url, 
		null, 
		new Response.Listener() { 

			@Override
			public void onResponse(JSONObject response) 
			{ 
				Log.d(TAG, response.toString()); 
				pDialog.hide(); 
			} 
		}, 
		new Response.ErrorListener() { 

			@Override
			public void onErrorResponse(VolleyError error) 
			{ 
				VolleyLog.d(TAG, "Error: "
									+ error.getMessage()); 
				pDialog.hide(); 
			} 
		}) { 

		@Override
		protected Map getParams() 
		{ 
			Map params = new HashMap(); 
			params.put("name", "Androidhive"); 
			params.put("email", "abc@androidhive.info"); 
			params.put("password", "password123"); 

			return params; 
		} 

	}; 

AppController.getInstance() 
	.addToRequestQueue(jsonObjReq, tag_json_obj);
```

# Adding Request Headers 
```
String tag_json_obj = "json_obj_req"; 

String 
	url 
	= "https:// api.androidhive.info/volley/person_object.json"; 

ProgressDialog pDialog = new ProgressDialog(this); 
pDialog.setMessage("Loading..."); 
pDialog.show(); 

JsonObjectRequest 
	jsonObjReq 
	= new JsonObjectRequest( 
		Method.POST, 
		url, 
		null, 
		new Response.Listener() { 

			@Override
			public void onResponse(JSONObject response) 
			{ 
				Log.d(TAG, response.toString()); 
				pDialog.hide(); 
			} 
		}, 
		new Response.ErrorListener() { 

			@Override
			public void onErrorResponse(VolleyError error) 
			{ 
				VolleyLog.d(TAG, "Error: "
									+ error.getMessage()); 
				pDialog.hide(); 
			} 
		}) { 

		@Override
		public Map getHeaders() throws AuthFailureError 
		{ 
			HashMap headers = new HashMap(); 
			headers.put("Content-Type", "application/json"); 
			headers.put("apiKey", "xxxxxxxxxxxxxxx"); 
			return headers; 
		} 

	}; 

AppController.getInstance() 
	.addToRequestQueue(jsonObjReq, tag_json_obj);
```

# Handling the Volley Cache 

```
// Loading request from cache 
Cache 
	cache 
	= AppController.getInstance() 
		.getRequestQueue() 
		.getCache(); 

Entry entry = cache.get(url); 
if (entry != null) { 
	try { 
		String 
			data 
			= new String(entry.data, "UTF-8"); 
		// handle data, like converting it 
		// to xml, json, bitmap etc., 
	} 
	catch (UnsupportedEncodingException e) { 
		e.printStackTrace(); 
	} 
} 
} 
else
{ 
	// If cached response doesn't exists 
} 

// Invalidate cache 
AppController.getInstance() 
	.getRequestQueue() 
	.getCache() 
	.invalidate(url, true); 

// Turning off cache 
// String request 
StringRequest 
	stringReq 
	= new StringRequest(....); 

// disable cache 
stringReq.setShouldCache(false); 

// Deleting cache for particular cache</strong> 
AppController.getInstance() 
	.getRequestQueue() 
	.getCache() 
	.remove(url); 

// Deleting all the cache 
AppController.getInstance() 
	.getRequestQueue() 
	.getCache() 
	.clear(url);
```

# Cancelling Request 
```
// Cancel single request 
String tag_json_arry = "json_req"; 

ApplicationController.getInstance() 
	.getRequestQueue() 
	.cancelAll("feed_request"); 

// Cancel all request 
ApplicationController.getInstance() 
	.getRequestQueue() 
	.cancelAll();
```

# Request Prioritization 

```
private Priority priority = Priority.HIGH; 

StringRequest 
	strReq 
	= new StringRequest( 
		Method.GET, 
		Const.URL_STRING_REQ, 
		new Response 
			.Listener() { 

					@Override
					public void onResponse(String response) { 

						Log.d(TAG, response.toString()); 
						msgResponse.setText(response.toString()); 
						hideProgressDialog(); 

					} }, 
		new Response 
			.ErrorListener() { 

					@Override
					public void
					onErrorResponse(VolleyError error) { 

						VolleyLog.d(TAG, 
									"Error: "
										+ error.getMessage()); 
						hideProgressDialog(); 
					} }) { 

		@Override
		public Priority getPriority() 
		{ 
			return priority; 
		} 

	};

```
