# JAVASCRIPT CODE SNIPPET

## querySelector();
```
var divClass = document.querySelector(".divClass");
```

## querySelectorAll("div");
```
var div = document.querySelectorAll("div");

div.forEach(val => {
  val.addEventListener();
});
```

## addEventListener();
```
var divClass = document.querySelector(".divClass");

divClass.addEventListener("click", myFunction);

function myFunction(){
  // Function Goes Here ...
}
```
`or`

```
var divClass = document.querySelector(".divClass");

divClass.addEventListener("click", () =>{
  // Function Goes Here ...
});
```

## createElement();
```
var nameInput = document.createElement("input");
nameInput.type = "text";
nameInput.name = "userName[]";
nameInput.placeholder = "Enter Your Name";
```
`or`
```
var closeBtn = document.createElement("a");
closeBtn.className = "closeBtnStyle";
closeBtn.innerHTML = "&times;"
closeBtn.href = "http://index.php?del=1"
```
`or`
```
var closeBtn = document.createElement("div");
closeBtn.className = "closeBtnStyle";
```
`appendChild();`
```
divGroup.appendChild(inputField);
```
`remove();`
```
function removeInputField(){
  this.parentElement.remove();
}
```

## Combining `javascript:` and `void(0)`
Sometimes, you do not want a link to navigate to another page or reload a page. Using `javascript:`, you can run code that does not change the current page.

This, used with `void(0)` means, do nothing - don't reload, don't navigate, do not run any code.

For example:
```
<a href="javascript:void(0)">Link</a>
```
The "Link" word is treated as a link by the browser. For example, it's focusable, but it doesn't navigate to a new page.

`0` is an argument passed to `void` that does nothing, and returns nothing.

JavaScript code (as seen above) can also be passed as arguments to the `void` method. This makes the link element run some code but it maintains the same page.

For example:
```
<a id='link' href="javascript:void(
  document.querySelector('#link').style.color = 'green'
)">Link</a>
```
