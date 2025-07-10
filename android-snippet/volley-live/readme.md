# Simple Volley Get Request
This Snippet Example Send Simple Volley Get Request. 

# Add Following Code 

## build.gradle

```
dependencies {
    ...
    implementation 'com.android.volley:volley:1.2.1'
    ...
}
```

## AndroidManifest.xml

```
...
<uses-permission android:name="android.permission.INTERNET" />
...
```

## activity_main.xml

```
...
    <TextView
        android:id="@+id/url_txt"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Please Wait for Response."
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toTopOf="parent" />
...
```

## MainActivity.java.xml

```
...
    TextView ttt;
    String url = "https://www.google.com";
...
            ttt = findViewById(R.id.url_txt);

            StringRequest sr = new StringRequest(Request.Method.GET, url,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            ttt.setText(response);
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    ttt.setText(error.toString());
                }
            }
            );

            RequestQueue rq = Volley.newRequestQueue(this);
            rq.add(sr);
...
```
