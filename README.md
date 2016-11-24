<h2>First</h2>
<p>A plugin wordpress for make a dynamic summary for the post. You can generate a summary and an indicator of reading time of post when the post saved</p>

<h2>Tools</h2>
<p>For this plugin, i worked with a boilerplate of Devin Vinson : http://wppb.me/. This POO architecture was to important for my developpement</p>

<p>Other sources for my developpement it was two posts in a website geekpress. This posts are here : </p>

<ul>
<li>http://www.geekpress.fr/hook-save-post-generer-sommaire/</li>
<li>http://www.geekpress.fr/utiliser-hook-save_post-generer-sommaire-definir-temps-de-lecture-dun-article/</li>
</ul>

<p>My job it was to adapt the code for the boilerplate of Devin Vinson</p>

<h2>Using the Plugin</h2>
<p>After an installation and activation of this plugin, you can see an other menu page in your back office : Summary. This administration pannel is very simple and generate with jquery ui tabs. In this options tabs, you can see the PHP codes for use correctly this plugin (dont't forget the PHP rafters):</p>

<ul>
<li>generate summary : echo get_post_meta($post->ID, '_summary', true);</li>
<li>reading time : echo get_post_meta($post->ID, 'reading_time', true) . "minutes";</li>
</ul>

<p>This code must be pasted into a wordpress template (single.php for example)</p>

<h3>CSS of summary</h3>
<p>For the desing of summary, you can change the css in this directory : public/css/wp-dynamic-summary-public.css. It's a design minimalist. You can play with this color and css3 effect or other things...good games !!</p>

<h3>Uninstall</h3>
<p>The data in the post meta database will be erased</p>

<h3>Future</h3>
Many ideas for this plugin. If you want to make this plugin with me, you can develop any functions in the dev branch
Be continued !!
