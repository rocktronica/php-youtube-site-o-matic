PHP-YouTube-Site-o-Matic*
=========================
<small>* Tentatively titled. Open to suggestions...</small>

Takes a YouTube username (and a couple other variables) and returns a whole video website with paginated lists, thumbnails, embeds, comments, and an RSS feed.

![Tommy and the Tommies](http://iamnotagoodartist.com/wp-content/uploads/2011/04/phpyoutube_tommies.jpg)

Basically, it's your YouTube profile with its own domain and CSS.

### Examples:

* [videos.iamnotagoodartist.com](http://videos.iamnotagoodartist.com/)<br />
  Pardon the swears...
* [tommyandthetommies.com](http://tommyandthetommies.com/)<br />
  The site I originally wrote this script for. Only has a couple videos. Modified CSS.

Needs PHP5 and a YouTube username. Doesn't need a database or a YouTube API key.

Instructions
------------

Unzip into an empty domain or subdomain. Links may need some editing if you use it in a non-root folder.

Open `index.php` and switch out the user variables with your own. If `$_SERVER["HTTP_HOST"]` doesn't come out to be something like `yourdomain.com`, try `$_SERVER['SERVER_NAME']` or write the domain in manually. After that, everything's aesthetic. Restyle to suit.

Credit
------

* Mullenweg's [AutoP function](http://ma.tt/scripts/autop/)
* [jQuery Masonry](http://desandro.com/resources/jquery-masonry) by David DeSandro

Could Use...
------------

* Caching
* Tags
* View counts

### Disclaimer

I wrote this awhile ago and am not 100% on some of it. I'm putting it on GitHub to see if there's any interest. No warranty, no guarantee, use at your own risk, etc.

License
-------

Open source GPL. Attribution appreciated but not required.