For our CS 460 final project, we implemented an idea suggested by Professor Bambenek. The idea was to create a way of querying for the multiple names AV vendors give hashes of malware. We decided to implement this in a publically accessible website where users can input their hashes on the site and be able to receive a detailed report of each entered hash.

<h2>Problem</h2>
There are many different AntiVirus vendors. Each of them identify a piece of malware with a different name. 

<h2>Summary</h2>
Hash Slinger is a web-based client for determining the various names given to file hashes by the many anti-virus cataloging services. This is information is provided by the VirusTotal Public API.

Hash Slinger is able to search for names using MD5, SHA1, or SHA256 hashes.

Recently searched hash queries are stored and hashes that have been most frequently queried can be viewed.

<h2>Live Implementation</h2>
Please visit http://cs460hashscan.web.engr.illinois.edu/public/home.php for the live website version.

<h2>Contributors</h2>
Alex Dahlquist (dahlqui2) and Harsh Patel (hpatel90)

<h2>Technologies Used</h2>
PHP VirusTotal Public API V2 (http://www.ab-weblog.com), Bootstrap, jQuery, PHP
