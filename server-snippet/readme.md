# Rewrite Rules Using htaccess
The Apache module mod_rewrite allows you to rewrite URL requests that come into your server. It is based on a regular-expression parser. When the url in your browser's location bar stays the same for a request, it is an internal rewrite, when the url changes, it is an external redirection.

For example, to redirect http://example.com/file.html to http://example.com/folder1/file.html:

Options +FollowSymLinks
RewriteEngine On
RewriteCond %{HTTP_HOST} example.com$ [NC]
RewriteCond %{HTTP_HOST} !folder1
RewriteRule ^(.*)$ http://example.com/folder1/$1 [R=301,L]
Options +FollowSymLinks is an Apache directive, prerequisite for mod_rewrite.

RewriteEngine On enables mod_rewrite rewriting engine.

RewriteCond basically means execute the next RewriteRule only if this is true.

%{HTTP_HOST} means the domain of the queried URL.

RewriteRule defines a particular rule. The first string of characters after RewriteRule defines what the original URL. The second string after RewriteRule defines the new URL. 

RewriteRule pattern target [Flag1,Flag2,Flag3]
[NC] matches both upper-case and lower-case versions of the URL.

[R=301,L] performs a 301 redirect and also stops any later rewrite rules from affecting this URL.

RewriteCond %{REQUEST_FILENAME} !-f means if the file with the specified name in the browser doesn't exist, then proceed to the rewrite rule below. In other words, it means if the requested filename is not a regular file that exists.

RewriteCond %{REQUEST_FILENAME} !-d means if the directory with the specified name in the browser doesn't exist, then proceed to the rewrite rule below. In other words, it means if the requested filename is not a directory.

RewriteCond %{REQUEST_FILENAME} !-l means if the requested filename is not a symbolic link.

# Flags or Options
Flags are added to the end of a rewrite rule to tell Apache how to interpret and handle or process the rule. They can be used to tell Apache to treat the rule as case-insensitive, to stop processing rules if the current one matches, or many other options. They are comma-separated, and contained in square brackets.

C means chained with next rule)

CO=cookie (set specified cookie)

E=var:value means set environment variable var to value

F means forbidden. It sends a 403 header to the user

G means gone. It no longer exists.

H=handler means set handler

L means last. It stops processing following rules. L is a useful option to tell the rewrite engine to stop once the rule has been matched. However, once a URL has been rewritten, the entire set of rules are then run again on the new URL. If the new URL matches any of the rules, that too will be rewritten and on it goes.

N means next, continue processing rules

NC means case insensitive

NE means do not escape special URL characters in output.

NS means ignore this rule if the request is a sub request.

P means proxy, Apache should grab the remote content specified in the substitution section and return it.

PT means pass through. It is uses when processing URLs with additional handlers like mod_alias.

R means temporary redirect to new URL.

R=301 means permanent redirect to new URL. It send the user’s browser to the new URL. A status of 301 means a resource has moved permanently and so it’s a good way of both redirecting the user to the new URL, and letting search engines know to update their indexes.

QSA means append query string from request to substituted URL. If there's a query string passed with the original URL, it will be appended to the rewrite. The QSA flag means to append an existing query string after the URI has been rewritten.

S=x means skip next x rules

T=mime-type means force specified mime type

# Regular Expressions
Rewrite rules contain symbols that make a regular expression (regex). This is how the server knows exactly how you want your URL changed.

^ begins the line to match. $ ends the line to match. For example, ^folder1$ matches folder1 exactly. When a pattern starts with ^ and ends with $, it’s to make sure you match the complete URL start to finish, not just part of it.

. stands for any non-whitespace character. * means that the previous character can be matched zero or more times. For example, So, ^uploads.*$ matches uploads2016, uploads2017, etc.

^.*$ matches anything and everything. This is useful if you don't know what users might type for the URL.

[0-9] matches a number, 0–9. [2-4] would match numbers 2 to 4 inclusive.

[a-z] matches lowercase letters a–z. 

[A-Z] matches uppercase letters A–Z.

[a-z0-9] matches letters a–z and numbers 0–9.

[0-9]{4} means any character between 0 and 9, four times. For example, year.

[0-9]+ matches any number if you don't know how long it might be.

# Groups and Replacements
When rewriting URLs you’ll often want to take important parts of the URL you’re matching and pass them along to the script that handles the request. That’s usually done by adding those parts of the URL on as query string arguments.

For example: /article.php?year=2017&slug=article-title

SEF URL: 2017/article-title/

In this, you need to mark which parts of the pattern you want to reuse in the destination. You can do this with round brackets or parentheses. To change the above example to Search Engine Friendly (SEF) URL, make a group that match the year and slug, but ignoring the slashes:

^([0-9]{4})/([a-z0-9-]+)/$

To use the groups in the destination URL, use the dollar sign and the number of the group we want to use. So, the first capturing group is $1, the second is $2 and so on. Here, the value of the year group gets used as $1 and the article title slug is $2. In regex, these are called back-references as they refer back to the pattern.

RewriteRule ^([0-9]{4})/([a-z0-9-]+)/$ /article.php?year=$1&slug=$2

() designates which portion to preserve for use again in the $1 variable in the second string. This is useful for handling requests for particular files that should be the same in the old and new versions of the URL.

# Example 1: External Redirect .php files to .html files
RewriteRule ^(.*)\.php$ /$1.html [R=301,L]
# Example 2: Internal Redirect .php files to .html files
It redirects all files that end in .html to be served from filename.php so it looks like all your pages are .html but really they are .php

RewriteRule ^(.*)\.html$ $1.php [R=301,L]
# Example 3: PHP file to handle all non-static requests
It is also known as the front controller pattern. This mechanism is the basis for any web framework. In PHP, it allows you to read the actual requested path in the $_SERVER[‘REQUEST_URI’] global variable.

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php [QSA,L]
Example 4: Removing file extensions
Sometimes you need to do to tidy up a URL is strip off file extension.

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.+)$ $1.php [L,QSA]
