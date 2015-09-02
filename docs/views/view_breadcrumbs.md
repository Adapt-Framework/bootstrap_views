# Class `view_breadcrumbs`
**Inherits from:** [view](view.md)

A view to create a breadcrumb trail.


## Constructing
### __construct(`$items`)

Constructs a new bootstrap breadcrumb view.

#### Input:
- `$items` (Optional) An assoc array containing the breadcrumb name and the URL to point it too.

--

## Methods
### add(`$name`, `$url = null`, `$selected = false`)

Adds a new item to the breadcrumb.

#### Input:
- `$name` The name of the item to appear in the breadcrumb.
- `$url = null` (Optional) The URL to link the item against.
- `$selected` (Optional) A Boolean indicating that this item is the page currently being viewed.



