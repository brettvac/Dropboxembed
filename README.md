# Dropbox Embed Joomla! Content Plugin

![Dropbox Embed](Dropboxembed.jpg)

Dropbox Embed is a Joomla! content plugin that [harnesses the power of the Dropbox Embedder](https://dropbox.tech/developers/now-available--dropbox-embedder) to allow you to embed Dropbox files and folders into your Joomla! website content using a simple shortcode.

## Why Use Dropbox Embed?

If you have a file or folder on Dropbox and you want to display this content directly on your Joomla! site, you can use the Dropbox Embedder instead of manually copying and pasting Dropbox links into your Joomla! content. 

The Dropbox Embed plugin lets you embed Dropbox files and folders directly using a shortcode, instead of adding JavaScript and HTML directly into the editor or template file.

With the Dropbox Embed plugin, no more fiddling with HTML code--just use the shortcode and insert the Dropbox file or folder link. 

You can also adjust height and width options in the plugin options for maximum viewer experience.

## How To Install The Dropbox Embed Content Plugin

1. Go to [https://www.dropbox.com/developers/apps/create](https://www.dropbox.com/developers/apps/create) and follow the instructions to create a Dropbox App and get your App Key.
2. Install the plugin via the Joomla! Extensions Manager--you can use this URL to install the latest release: [https://github.com/brettvac/dropboxembed/releases/latest/download/plg_content_dropboxembed.zip](https://github.com/brettvac/dropboxembed/releases/latest/download/plg_content_dropboxembed.zip)
3. Configure the plugin settings by entering your Dropbox App Key & choosing your layout preferences.
4. Enable the plugin.

## How To Use The Dropbox Embed Content Plugin

1. Inside your Dropbox, upload or create your content.
2. Copy a share link for the folder or file that you want to share (remember to include the rlkey parameter)
3. Then, use the following shortcode in your content: `{dropbox}DROPBOX_LINK{/dropbox}`

### Style Options

You can control the width and height of the iframe which displays the Dropbox content directly in the shortcode as follows:

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

## FAQ
**Q: It's not working!**  
**A:** That's annoying! First, check that you created an app, and you entered the correct app key. If you see a message saying "Dropbox refuses to connect", make sure you've added your domain to the **Chooser / Saver / Embedder** domains.

**Q: Does this app work with Box?**  
**A:** No, this app is for integrating files on dropbox.com, not box.com. 

**Q: This plugin is awesome! Can I send a donation?**  
**A:** Sure! Send your cryptonation to the following wallets:

`BTC 1PXWZJcBfehqgV25zWdVDS6RF2yVMxFkZD`

`Eth 0xC9b695D4712645Ba178B4316154621B284e2783D`

## Further Reading
Read the **Dropbox Embedder Documentation** at [https://www.dropbox.com/developers/embedder](https://www.dropbox.com/developers/embedder)
