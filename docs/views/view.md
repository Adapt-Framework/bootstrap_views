# Class `view`
**Inherits from:** \frameworks\adapt\view

This is the foundation class for all bootstrap views.

## Table of Contents
- [Constants](#Constants)
- [Constructing](#Constructing)
- [Properties](#Properties)
    - [float](#float)
    - [center_block](#center_block)
    - [hidden](#hidden)
    -  [visible](#visible)
    - [col_span_lg](#col_span_lg)
    - [col_span_md](#col_span_md)
    - [col_span_sm](#col_span_sm)
    - [col_span_xs](#col_span_xs)
    - [col_offset_lg](#col_offset_lg)
    - [col_offset_md](#col_offset_md)
    - [col_offset_sm](#col_offset_sm)
    - [col_offset_xs](#col_offset_xs)
    - [col_push_lg](#col_push_lg)
    - [col_push_md](#col_push_md)
    - [col_push_sm](#col_push_sm)
    - [col_push_xs](#col_push_xs)
    - [col_pull_lg](#col_pull_lg)
    - [col_pull_md](#col_pull_md)
    - [col_pull_sm](#col_pull_sm)
    - [col_pull_xs](#col_pull_xs)

## Constants

Constant              | Value
----------------------|------------
NONE                  | ''
FLOAT_RIGHT           | 'pull-right'
FLOAT_LEFT            | 'pull-left'

## Constructing
### __construct(`$tag = 'div'`, `$data = null`, `$attributes = array()`)
Constructs a new bootstrap view.  This class offers the base functionality for building rich bootstrap views.

### Input:
- `$tag` The HTML tag to create, eg, 'div', 'strong', 'h1', etc...
- `$data` (Optional) Any items that you'd like to add to this HTML element.
- `$attributes` (Optional) An assoc array of attributes and values for this HTML element.



## Properties
### float
Sets or returns the float value, this can be `NONE`, `FLOAT_LEFT` or `FLOAT_RIGHT` which causes the view to float in the direction specified.

--

### center_block
Boolean indicating if the text in this view should be centered.  Accepts `true` or `false`.

--

### hidden
A boolean indicating if this view should be visiable or hidden.

--

### visible
A boolean indicating if this view should be visiable or hidden.

--

### col_span_lg
An integer between 1 and 12 indicating how many columns this view should span on large screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_span_md
An integer between 1 and 12 indicating how many columns this view should span on medium screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_span_sm
An integer between 1 and 12 indicating how many columns this view should span on small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_span_xs
An integer between 1 and 12 indicating how many columns this view should span on extra small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_offset_lg
An integer between 1 and 12 indicating how many columns this view should be offset by on large screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_offset_md
An integer between 1 and 12 indicating how many columns this view should be offset by on medium screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_offset_sm
An integer between 1 and 12 indicating how many columns this view should be offset by on small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_offset_xs
An integer between 1 and 12 indicating how many columns this view should be offset by on extra small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_push_lg
An integer between 1 and 12 indicating how many columns this view should be pushed over by on large screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_push_md
An integer between 1 and 12 indicating how many columns this view should be pushed over by on medium screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_push_sm
An integer between 1 and 12 indicating how many columns this view should be pushed over by on small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_push_xs
An integer between 1 and 12 indicating how many columns this view should be pushed over by on extra small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_pull_lg
An integer between 1 and 12 indicating how many columns this view should be pulled back by on large screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_pull_md
An integer between 1 and 12 indicating how many columns this view should be pulled back by on medium screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_pull_sm
An integer between 1 and 12 indicating how many columns this view should be pulled back by on small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.

--

### col_pull_xs
An integer between 1 and 12 indicating how many columns this view should be pulled back by on extra small screens.  See [GetBootstrap.com/css/#grid](http://getbootstrap.com/css/#grid) for more information on grid layouts.


