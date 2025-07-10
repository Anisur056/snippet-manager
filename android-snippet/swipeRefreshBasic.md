# Simple SwipeRefresh 
This Snippet Example Add SwipeRefresh in Activiy. 

# Add Following Code 

## build.gradle

```
dependencies {
    ...
    implementation "androidx.swiperefreshlayout:swiperefreshlayout:1.1.0"
    ...
}
```


## activity_main.xml

```
...
    <androidx.swiperefreshlayout.widget.SwipeRefreshLayout
        android:id="@+id/swipe_refresh"
        android:layout_width="match_parent"
        android:layout_height="match_parent">

        <TextView
            android:id="@+id/count"
            android:layout_width="wrap_content"
            android:layout_height="wrap_content"
            android:gravity="center"
            android:text="Pull Down"
            android:textColor="@color/black"
            android:textSize="50dp"/>

    </androidx.swiperefreshlayout.widget.SwipeRefreshLayout>
...
```

## MainActivity.java.xml

```
...
    SwipeRefreshLayout swipeRefreshLayout;
    TextView count;
    int number = 0;
...
        swipeRefreshLayout = findViewById(R.id.swipe_refresh);
        count = findViewById(R.id.count);

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                number++;
                count.setText(String.valueOf(number));
                swipeRefreshLayout.setRefreshing(false);
                Toast.makeText(MainActivity.this,"Refreshed",Toast.LENGTH_SHORT).show();
            }
        });

...
```
