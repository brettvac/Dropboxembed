Dropbox Embed - Joomla! Content Plugin
=============

![Dropbox Embed](Dropboxembed.jpg)

Dropbox Embed is a Joomla! plugin that allows you to embed Dropbox files and folders into your Joomla! website using a simple shortcode.

This plugin requires Joomla versions greater than 4.4 and PHP 8.1.

Why Use Dropbox Embed?
------------

Instead of manually copying and pasting Dropbox links into your Joomla! content, this plugin lets you embed Dropbox files and folders directly.

No more fiddling with HTML code; just use the shortcode and insert the Dropbox file folder link. 

You can also adjust height and width options for maximum viewer experience.

How To Use Dropbox Embed
------------

1. You will need to [create a Dropbox App and get your API key](https://www.dropbox.com/developers/apps/create)
2. Install the plugin through the Joomla! Extensions Manager. You can use this URL: [https://github.com/brettvac/dropboxembed/releases/download/1.0/dropboxembed.zip](https://github.com/brettvac/dropboxembed/releases/download/1.0/dropboxembed.zip)
3. Configure the plugin settings by entering your Dropbox App Key.
4. Create & copy a share link for the folder or file that you want to share. Remember to include the rlkey parameter.

Then, use the following shortcode in your content:
```
{dropbox}DROPBOX_LINK|HEIGHT|WIDTH{/dropbox}
```
- **DROPBOX_LINK**: The full link to the Dropbox file or folder.
- **HEIGHT** (optional): The height of the embedded content (default is 100%).
- **WIDTH** (optional): The width of the embedded content (default is 100%).

### Example:
Show a Dropbox folder:
```
{dropbox}https://www.dropbox.com/scl/fo/5pu6lcznlqushows1gluk/AOuhBExMHsO0lGM5AqU5d2Y?rlkey=d113ffnzhu8vseecxxe61ddk3{/dropbox}
```
You can also customize the embed by adding optional height and width parameters in pixels:

```
{dropbox}https://www.dropbox.com/scl/fo/5pu6lcznlqushows1gluk/AOuhBExMHsO0lGM5AqU5d2Y?rlkey=d113ffnzhu8vseecxxe61ddk3|500|800{/dropbox}
```

This will embed the Dropbox file with a height of 500px and a width of 800px.

## Features
- Supports embedding both files and folders.
- Allows customization of embedded document (height and width) and appearance of the files.
- Ensures the Dropbox embed script is only loaded once per page.
- Compatible with Joomla! articles and modules (anything that supports Prepare Content).

## FAQ
**Q:What happens if I enter the wrong API key?**  
**A:** Nothing; your files won't display. It's very disappointing.

**Q: Do I need a Dropbox account to use this plugin?**  
**A:** Yes, and you also need to create a Dropbox app to get your API key.

**Q: This plugin is awesome! Can I send a donation?**  
**A:** Sure! Send your cryptonation to the following wallets:

`BTC 1PXWZJcBfehqgV25zWdVDS6RF2yVMxFkZD`

`Eth 0xC9b695D4712645Ba178B4316154621B284e2783D`

**Q: Got any more awesome Joomla! plugins?**  
**A:** Find them [right here](https://naftee.com)

## Further Reading
**[Dropbox Embedder Documentation](https://www.dropbox.com/developers/embedder)**