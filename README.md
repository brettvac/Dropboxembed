Dropbox Embed - Joomla! Content Plugin
============

![Dropbox Embed](Dropboxembed.jpg)

Dropbox Embed is a Joomla! content plugin that allows you to embed Dropbox files and folders into your Joomla! website using a simple shortcode.

Why Use Dropbox Embed?
------------

Instead of manually copying and pasting Dropbox links into your Joomla! content, this plugin lets you embed Dropbox files and folders directly.

No more fiddling with HTML code; just use the shortcode and insert the Dropbox file folder link. 

You can also adjust height and width options for maximum viewer experience.

How To Install The Dropbox Embed Content Plugin
------------

1. You will need to create a Dropbox App and get your API key. Go to [https://www.dropbox.com/developers/apps/create](https://www.dropbox.com/developers/apps/create) to set this up.
2. Install the plugin through the Joomla! Extensions Manager. You can use this URL to install the latest release: [https://github.com/brettvac/dropboxembed/releases/latest/download/plg_content_dropboxembed.zip](https://github.com/brettvac/dropboxembed/releases/latest/download/plg_content_dropboxembed.zip)
3. Configure the plugin settings by entering your Dropbox App Key & choosing your layout preferences.

How To Use The Dropbox Embed Content Plugin
------------

Inside Dropbox, create & copy a share link for the folder or file that you want to share. Remember to include the rlkey parameter. Then, use the following shortcode in your content:

```
{dropbox}DROPBOX_LINK|HEIGHT|WIDTH{/dropbox}
```
Where:
- **DROPBOX_LINK**: The full link to the Dropbox file or folder.
- **HEIGHT** (optional): The height of the embedded content (default is 100%).
- **WIDTH** (optional): The width of the embedded content (default is 100%).

### Example Usage
Show a Dropbox folder:
```
{dropbox}https://www.dropbox.com/scl/fo/5pu6lcznlqushows1gluk/AOuhBExMHsO0lGM5AqU5d2Y?rlkey=d113ffnzhu8vseecxxe61ddk3{/dropbox}
```
You can also customize the embed by adding optional height and width parameters in pixels. The following will embed the Dropbox file with a height of 500px and a width of 800px.
```
{dropbox}https://www.dropbox.com/scl/fo/5pu6lcznlqushows1gluk/AOuhBExMHsO0lGM5AqU5d2Y?rlkey=d113ffnzhu8vseecxxe61ddk3|500|800{/dropbox}
```
## Features
- Supports embedding both files and folders.
- Allows customization of embedded document (height and width) and appearance of the files.
- Ensures the Dropbox embed script is only loaded once per page.
- Compatible with Joomla! articles, modules and extensions that support Prepare Content

## Requirements
This plugin requires Joomla versions greater than 4.4 and PHP 7.2.5.

## FAQ
**Q: It's not working!**  
**A:** That's annoying! First, check that you created an app, and you entered the correct app key. If you see a message saying "Dropbox refuses to connect", make sure you've added your domain to the **Chooser / Saver / Embedder** domains.

**Q: Does this app work with Box?**  
**A:** No, this app is for integrating files on dropbox.com, not box.com. 

**Q: This plugin is awesome! Can I send a donation?**  
**A:** Sure! Send your cryptonation to the following wallets:

`BTC 1PXWZJcBfehqgV25zWdVDS6RF2yVMxFkZD`

`Eth 0xC9b695D4712645Ba178B4316154621B284e2783D`

**Q: Got any more awesome Joomla! plugins?**  
**A:** Find them [right here](https://naftee.com)

## Contributing / Further Reading
Read the **Dropbox Embedder Documentation** at [https://www.dropbox.com/developers/embedder](https://www.dropbox.com/developers/embedder)