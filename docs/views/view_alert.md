# Class `view_alert`
**Inherits from:** [view](view.md)

Creates bootstrap style alerts.

## Table of Contents
- [Constants](#Contants)
- [Constructing](#Constructing)
- [Properties](#Properties)
    - [style](#style)
    - [dismissable](#dismissable)
    
## Constants
Contstant       | Value
----------------|--------------
SUCCESS         | 'alert-success'
INFO            | 'alert-info'
WARNING         | 'alert-warning'
DANGER          | 'alert-danger'

## Constructing
### __construct(`$message`, `$style = self::INFO`, `$dismissable = false`)

Constructs a new bootstrap alert.

#### Input:
- `$message` The message to be displayed in the alert.
- `$style` (Optional) The style of the alert, can be `SUCCESS`, `INFO`, `WARNING` or `DANGER`.
- `$dismissable` (Optional) A boolean indicating if this alert can be dismissed.

## Properties
### style
Changes the style of the alert, see [constants](#Contants) for a list of possible values.

--

### dismissable
A boolean indicating if this aleat can be dismissed.
