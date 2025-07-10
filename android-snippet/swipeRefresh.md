# WebView Page With SwipeRefresh
This Snippet Example Send Simple Volley Get Request. 

# Add Following Code 

## build.gradle

```
dependencies {
    ...
    implementation "androidx.swiperefreshlayout:swiperefreshlayout:1.1.0"
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
    <androidx.swiperefreshlayout.widget.SwipeRefreshLayout
        android:id="@+id/swipe_refresh"
        android:layout_width="match_parent"
        android:layout_height="match_parent">

        <WebView
            android:id="@+id/webview"
            android:layout_width="match_parent"
            android:layout_height="match_parent" />

    </androidx.swiperefreshlayout.widget.SwipeRefreshLayout>
...
```

## MainActivity.java.xml

```
...
    SwipeRefreshLayout swipeRefreshLayout;
    private WebView webView;
...
        webView = (WebView) findViewById(R.id.webview);
        webView.setWebViewClient(new WebViewClient());
        webView.loadUrl("https://medex.com.bd/generics");
        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);

        swipeRefreshLayout = findViewById(R.id.swipe_refresh);
        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                webView.reload();
                swipeRefreshLayout.setRefreshing(false);
            }
        });
    }

    @Override
    public void onBackPressed() {
        if (webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
...
```
