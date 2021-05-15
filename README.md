# XData

XData is the best way to extract data from any kind of Web Service and import it into Google Spreadsheet

## Get Started

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

## Usage

```
=IMPORTDATA("https://webrequest.ml/javanile/xdata/github?repos")
```


{
  ID: 0

  data: {
    a:
    b:
    c:
  }  

  data: [
    prova: 1
    {
        a:
        b:
        c:
    }
    {
        b:
        c:    
    }
    {}
  ]
}

table 
columns

row=0
foreach node as item {
    if (is_array(item)) {
        table[row]['#'] = 
        foreach (columns as column) {
            table[row][column] = item[column] ?? ''            
        }
    } else {
        
    }
    merge get_keys item
    row++
}


