# Class `view_button`
**Inherits from:** [view](view.md)

A view to create a new bootstrap style button.


## Table of Contents
- [Constants](#Constants)
    - [Button styles](#Button-styles)
    - [Button size](#Button-size)
- [Constructing](#Constructing)
- [Properties](#Properties)
    - [style](#style)
    - [size](#size)
    - [block](#block)
    - [disabled](#disabled)

## Constants
### Button styles
Constant        | Value
----------------|------------
STANDARD        | 'btn-default'
PRIMARY         | 'btn-primary'
SUCCESS         | 'btn-success'
INFO            | 'btn-info'
WARNING         | 'btn-warning'
DANGER          | 'btn-danger'
LINK            | 'btn-link'

### Button size
Constant        | Value
----------------|-----------
LARGE           | 'btn-lg'
NORMAL          | ''
SMALL           | 'btn-sm'
EXTRA_SMALL     | 'btn-xs'


## Constructing
### __construct(`$label`, `$size = self::NORMAL`, `$style = self::STANDARD`)

Constructs a new bootstrap button.

#### Input:
- `$label` The label to appear on the button.  This may be HTML.
- `$size` (Optional) The size of the button, see [button sizes](#Button-size) for available options.
- `$style` (Optional) The style of the button, see [button styles](#Button-styles) for available options.

--

## Properties
### style
Sets or returns the style of the button, a full list of options can be viewed [here](#Button-styles).

--

### size
Sets or returns the size of the button, a full list of options can be viewed [here](#Button-size).

--

### block
A boolean indicating if this button should act as a block element.

--

### disabled
A boolean indicating if this button should be disabled.
