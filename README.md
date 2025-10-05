# Modoc

- Designed with the use of tables and blocks in mind. 
- When you need to optimize screen real estate utilization.
- Full color and typography options.
- *__Modoc is a good Admin Theme.__*

## Documentation

Full documentation will be developed as time and resources permit. You may also visit our wiki at https://github.com/backdrop-contrib/modoc/wiki
Meanwhile, here are some tips:

 ### Available settings located at `Appearance | Modoc Settings`
 #### New in ver. 1.x-1.2
- You may now set the border radius for Blocks and for Buttons (two separate settings).
- The logo image may now be scaled using the "Max Logo Width" setting at `Appearance | Modoc Settings`. No need to prescale your logo.
 #### Newer in ver. 1.x-1.3
- You may now set the default Block border line width for all blocks.
- An additional Color selector has been added: Table Cell Border color (also sets Fieldset borders).
- *__Big News:__* You may now Save your custom color schemes, then come back to them later!

 #### General Tips  
- Particularly useful for side menus and blocks: you may add the CSS class 'hide-overflow' to any block through the UI (see below). this will truncate the contents rather than having them bleed into the body of the next layout column to the right.
- The easiest way to get rid of *all* the block borders is to set the block border color the same as the page background color.
- To change the border-width of a block, you may add one of the following CSS classes to any block through the admin UI at `Configure Block | Style Settings | Style:Default -> Additional CSS Classes`:
  - 'border-0' (no border)
  - 'border-1' (1px)
  - 'border-2' (2px)
  - 'border-3' (3px...)
  - 'border-5' 
  - 'border-7'
  - 'border-10' (10px)
  - combine any of the above with 'hide-overflow' (separated by a space)
- If you want change the line-weight of the lines between Table Rows, you may add one of the following CSS classes to the `Views | Table | Settings -> Row class`:
  - 'rowlines-0' (no lines)
  - 'rowlines-1' (1px)
  - 'rowlines-2' (2px...)
  - 'rowlines-3'
  - 'rowlines-5'
  - 'rowlines-7'
  - 'rowlines-10' (10px, if you're feeling really spunky)
- There are two CSS classes provided for convenience: 'button' and 'tight-button', which can be used to make a link look really nice. Do it by wrapping your link inside a span like this:
  - `\<span class="button" type="button"\>\<a href="..."\>your button label\</a\>\</span\>`
    or
  - `\<span class="tight-button" type="button"\>\<a href="..."\>your button label\</a\>\</span\>`
    
## Caveats

- For vertical menus, you may want to set the Menu Style to 'Dropdown Menu' in order to make them look good. More work on this is pending.
- More testing is required to make sure that menus work in every layout implementation, etc.
### To-Do
- *__Done:__* ~~Add a box and button corner radius selection, for more styling options.~~
- *__Done:__* ~~Add a default border line-weight selection, for more styling options.~~
- *__Done:__* ~~Add the ability to save and later retrieve a custom color scheme.~~
- Implement color gradients for buttons and block backgrounds.
- Continue the never-ending process of refining and cleaning up the css.
- etc.

## Installation

- Install this theme using the official [Backdrop CMS instructions](https://backdropcms.org/guide/themes)


## Issues

Bugs and Feature requests should be reported in the [Issue Queue](https://github.com/backdrop-contrib/modoc/issues).


## Current Maintainers

- [ericfoy](https://github.com/ericfoy)


## Credits

Modoc was inspired by the Monochrome theme, adapted and refactored by ericfoy.
Thanks, [Indigoxela](https://github.com/indigoxela), for the springboard.

The Lekton font was designed at [ISIA Urbino.](https://isiaurbino.net/istituto/english)

The News Cycle font is Copyright (c) 2010-2011, Nathan Willis (nwillis@glyphography.com),
with Reserved Font Name “News Cycle.” 

The Benchnine font is Copyright (c) 2012, Vernon Adams (vern@newtypography.co.uk), 
with Reserved Font Name ‘BenchNine.’ 

The Montserrat font is Copyright (c) 2011, The [Montserrat Project Authors](https://github.com/JulietaUla/Montserrat). 

All fonts are licensed under the SIL Open Font License, Version 1.1.
All font licenses are available at: http://scripts.sil.org/OFL

## License

This project is GPL v2 software. See the LICENSE.txt file in this directory for the complete text.
---
![screenshot6](https://user-images.githubusercontent.com/60248933/231883600-3a2a74f5-6d84-4a03-b1c2-2d216425763d.png)
---
![screenshot4](https://user-images.githubusercontent.com/60248933/231575264-6b935fdf-2c6e-47ea-855a-9ed9250bad3e.png)
---
![screenshot5](https://user-images.githubusercontent.com/60248933/232276871-79ad237f-4134-48b0-b28b-48c619a534f1.png)
---
