# mloop
## Overview
REPLAY! is a Web app for sharing and looping music online.  

## Features
Sharing:
<ul>
<li> Upload music files from any device accessing the site (for the purposes of the Hackathon, the site is hosted on a local server) </li>
<li> Select and play audio files from the list of songs stored on the site from any device </li>
</ul>
<br>
<br>
Playback:
Several looping options provided.
<ul>
<li> Loop the song a custom number of times </li>
<li>  Loop a certain range of a song </li>
<li>  Include a delay between loops  </li>
</ul>


## Demos - Click GIFS to view videos with sound
Overall Demo - Uploading and Playing Music <br>
[![Demo CountPages alpha](https://j.gifs.com/Y6ZZyO.gif)](https://youtu.be/fMZb3RRcbJ4)

Looping A Set Number Of Times <br>
[![Demo CountPages alpha](https://j.gifs.com/DRxxW6.gif)](https://youtu.be/QBSQhSNAivI)


Looping A Set Number Of Times with Delay <br>
[![Demo CountPages alpha](https://j.gifs.com/1jMM3Z.gif)](
https://youtu.be/-qYLy7YW8Io
)

Built from scratch using an Apache Server (XAAMP), MySQL, PHP, HTML/CSS, JavaScript/jQuery

## Deployment / Details
* REPLAY! has currently only been developed around a locally-based server, set-up by a computer, and having other devices access the web-app through the Local Area Network (typically, just the IP address and the main index.php file, in the form 111.111.11.111/index.php, for example)

* The web app can set up on any local server by starting an Apache server on a device whose root folder is the <i>mloop</i> folder, containing the css, images, songs folders, as well as all of the .php and .js files. Acccess to the webapp would then be available using the server's IP address and the index.php file in the URL, as described before. Uploaded music files are stored in the <i>songs</i> directory of the root <i>mloop</i> folder.

* The main next step that could be taken for this project is deploying it on a cloud-based server as opposed to relying on local severs - a very incomplete deployment is shown here: <a href="https://mloop.herokuapp.com/"></a>, where only a portion of the main web app has been deployed. With time, a complete deployment is definitely possible with tweaks.



## Contributors
* Agnes Jang 
* Brian Tom 
* Daniel Shih 
* Jayson Chao 
* Umesh Tanniru

Developed at Hack UCI 2017
