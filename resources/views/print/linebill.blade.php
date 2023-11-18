<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <meta name="author" content="Swati Keni" />
    <meta name="company" content="Microsoft Corporation" />
    <style type="text/css">
    html {
        font-family: Calibri, Arial, Helvetica, sans-serif;
        font-size: 11pt;
        background-color: white
    }

    a.comment-indicator:hover+div.comment {
        background: #ffd;
        position: absolute;
        display: block;
        border: 1px solid black;
        padding: 0.5em
    }

    a.comment-indicator {
        background: red;
        display: inline-block;
        border: 1px solid black;
        width: 0.5em;
        height: 0.5em
    }

    div.comment {
        display: none
    }

    table {
        border-collapse: collapse;
        page-break-after: always
    }

    .gridlines td {
        border: 1px dotted black
    }

    .gridlines th {
        border: 1px dotted black
    }

    .b {
        text-align: center
    }

    .e {
        text-align: center
    }

    .f {
        text-align: right
    }

    .inlineStr {
        text-align: left
    }

    .n {
        text-align: right
    }

    .s {
        text-align: left
    }

    td.style0 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style0 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style1 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: 2px solid #000000 !important;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: white
    }

    th.style1 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: 2px solid #000000 !important;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: white
    }

    td.style2 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style2 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style3 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style3 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style4 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style4 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style5 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style5 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style6 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style6 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style7 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style7 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style8 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style8 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style9 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style9 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style10 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style10 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style11 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style11 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style12 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style12 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style13 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    th.style13 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    td.style14 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style14 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style15 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: white
    }

    th.style15 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: white
    }

    td.style16 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style16 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style17 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style17 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style18 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style18 {
        vertical-align: middle;
        text-align: center;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style19 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style19 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style20 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style20 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style21 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style21 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style22 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style22 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style23 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style23 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style24 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style24 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style25 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style25 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style26 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style26 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style27 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style27 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style28 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style28 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style29 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style29 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style30 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style30 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style31 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style31 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style32 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style32 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style33 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style33 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style34 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style34 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style35 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style35 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style36 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    th.style36 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFFFF
    }

    td.style37 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style37 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style38 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style38 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style39 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style39 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style40 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style40 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style41 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style41 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style42 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    th.style42 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    td.style43 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    th.style43 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    td.style44 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    th.style44 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 8pt;
        background-color: white
    }

    td.style45 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style45 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style46 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style46 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style47 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 12pt;
        background-color: white
    }

    th.style47 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 12pt;
        background-color: white
    }

    td.style48 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 12pt;
        background-color: white
    }

    th.style48 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 12pt;
        background-color: white
    }

    td.style49 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 12pt;
        background-color: white
    }

    th.style49 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: none #000000;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 12pt;
        background-color: white
    }

    td.style50 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    th.style50 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    td.style51 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    th.style51 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    td.style52 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    th.style52 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    td.style53 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    th.style53 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 8pt;
        background-color: #FFFF00
    }

    td.style54 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style54 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style55 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: white
    }

    th.style55 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: white
    }

    td.style56 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: #FFFFFF
    }

    th.style56 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: #FFFFFF
    }

    td.style57 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: #FFFFFF
    }

    th.style57 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: #FFFFFF
    }

    td.style58 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style58 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style59 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style59 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style60 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style60 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style61 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style61 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style62 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    th.style62 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    td.style63 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    th.style63 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    td.style64 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    th.style64 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    td.style65 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    th.style65 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    td.style66 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    th.style66 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 2px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: #FFFFFF
    }

    td.style67 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    th.style67 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    td.style68 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    th.style68 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    td.style69 {
        vertical-align: bottom;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    th.style69 {
        vertical-align: bottom;
        border-bottom: 2px solid #000000 !important;
        border-top: 2px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    td.style70 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    th.style70 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 11pt;
        background-color: white
    }

    td.style71 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: #92D050
    }

    th.style71 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: #92D050
    }

    td.style72 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: #92D050
    }

    th.style72 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: #92D050
    }

    td.style73 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: #92D050
    }

    th.style73 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: #92D050
    }

    td.style74 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFF00
    }

    th.style74 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: #FFFF00
    }

    td.style75 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: #FFFF00
    }

    th.style75 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: #FFFF00
    }

    td.style76 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: #FFFF00
    }

    th.style76 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 12pt;
        background-color: #FFFF00
    }

    td.style77 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style77 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style78 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style78 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style79 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style79 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style80 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    th.style80 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 10pt;
        background-color: white
    }

    td.style81 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style81 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style82 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style82 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style83 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style83 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style84 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style84 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style85 {
        vertical-align: middle;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style85 {
        vertical-align: middle;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style86 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style86 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style87 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style87 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style88 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style88 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style89 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: white
    }

    th.style89 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri Light';
        font-size: 10pt;
        background-color: white
    }

    td.style90 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style90 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style91 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Cambria';
        font-size: 11pt;
        background-color: white
    }

    th.style91 {
        vertical-align: bottom;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Cambria';
        font-size: 11pt;
        background-color: white
    }

    td.style92 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style92 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style93 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style93 {
        vertical-align: bottom;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style94 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style94 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style95 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style95 {
        vertical-align: middle;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style96 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style96 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    td.style97 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    th.style97 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 9pt;
        background-color: white
    }

    table.sheet0 col.col0 {
        width: 34.56666627pt
    }

    table.sheet0 col.col1 {
        width: 40.6666662pt
    }

    table.sheet0 col.col2 {
        width: 48.79999944pt
    }

    table.sheet0 col.col3 {
        width: 48.79999944pt
    }

    table.sheet0 col.col4 {
        width: 48.79999944pt
    }

    table.sheet0 col.col5 {
        width: 48.79999944pt
    }

    table.sheet0 col.col6 {
        width: 48.79999944pt
    }

    table.sheet0 col.col7 {
        width: 44.73333282pt
    }

    table.sheet0 col.col8 {
        width: 44.73333282pt
    }

    table.sheet0 col.col9 {
        width: 44.73333282pt
    }

    table.sheet0 col.col10 {
        width: 44.73333282pt
    }

    table.sheet0 col.col11 {
        width: 69.13333254pt
    }

    table.sheet0 tr {
        height: 12pt
    }

    table.sheet0 tr.row2 {
        height: 15.5pt
    }

    table.sheet0 tr.row3 {
        height: 13pt
    }

    table.sheet0 tr.row4 {
        height: 13pt
    }

    table.sheet0 tr.row5 {
        height: 13pt
    }

    table.sheet0 tr.row6 {
        height: 13pt
    }

    table.sheet0 tr.row7 {
        height: 13pt
    }

    table.sheet0 tr.row8 {
        height: 13pt
    }

    table.sheet0 tr.row9 {
        height: 13pt
    }

    table.sheet0 tr.row10 {
        height: 13pt
    }

    table.sheet0 tr.row11 {
        height: 13pt
    }

    table.sheet0 tr.row12 {
        height: 13pt
    }

    table.sheet0 tr.row13 {
        height: 13pt
    }

    table.sheet0 tr.row14 {
        height: 13pt
    }

    table.sheet0 tr.row15 {
        height: 13pt
    }

    table.sheet0 tr.row16 {
        height: 12pt
    }

    table.sheet0 tr.row17 {
        height: 12pt
    }

    table.sheet0 tr.row18 {
        height: 12pt
    }

    table.sheet0 tr.row19 {
        height: 12pt
    }

    table.sheet0 tr.row20 {
        height: 12pt
    }

    table.sheet0 tr.row21 {
        height: 12pt
    }

    table.sheet0 tr.row22 {
        height: 12pt
    }

    table.sheet0 tr.row23 {
        height: 12pt
    }

    table.sheet0 tr.row24 {
        height: 13pt
    }

    table.sheet0 tr.row25 {
        height: 12pt
    }

    table.sheet0 tr.row26 {
        height: 12pt
    }

    table.sheet0 tr.row27 {
        height: 12pt
    }

    table.sheet0 tr.row28 {
        height: 12pt
    }

    table.sheet0 tr.row29 {
        height: 12pt
    }

    table.sheet0 tr.row30 {
        height: 12pt
    }

    table.sheet0 tr.row31 {
        height: 12pt
    }

    table.sheet0 tr.row32 {
        height: 12pt
    }

    table.sheet0 tr.row33 {
        height: 12pt
    }

    table.sheet0 tr.row34 {
        height: 12pt
    }

    table.sheet0 tr.row35 {
        height: 12pt
    }

    table.sheet0 tr.row36 {
        height: 12pt
    }

    table.sheet0 tr.row37 {
        height: 12pt
    }

    table.sheet0 tr.row38 {
        height: 12pt
    }

    table.sheet0 tr.row39 {
        height: 12pt
    }

    table.sheet0 tr.row40 {
        height: 12pt
    }

    table.sheet0 tr.row41 {
        height: 12pt
    }

    table.sheet0 tr.row42 {
        height: 12pt
    }

    table.sheet0 tr.row43 {
        height: 12pt
    }

    table.sheet0 tr.row44 {
        height: 12pt
    }

    table.sheet0 tr.row45 {
        height: 13pt
    }

    table.sheet0 tr.row46 {
        height: 13pt
    }

    table.sheet0 tr.row47 {
        height: 13pt
    }

    table.sheet0 tr.row48 {
        height: 13pt
    }

    table.sheet0 tr.row49 {
        height: 12pt
    }

    table.sheet0 tr.row50 {
        height: 12pt
    }

    table.sheet0 tr.row51 {
        height: 12pt
    }

    table.sheet0 tr.row52 {
        height: 12pt
    }

    table.sheet0 tr.row53 {
        height: 13pt
    }

    table.sheet0 tr.row54 {
        height: 12pt
    }

    table.sheet0 tr.row55 {
        height: 12pt
    }

    table.sheet0 tr.row56 {
        height: 13pt
    }

    table.sheet0 tr.row57 {
        height: 13pt
    }

    table.sheet0 tr.row59 {
        height: 12pt
    }

    table.sheet0 tr.row60 {
        height: 12pt
    }

    table.sheet0 tr.row61 {
        height: 12pt
    }

    table.sheet0 tr.row62 {
        height: 12pt
    }

    table.sheet0 tr.row63 {
        height: 12pt
    }

    table.sheet0 tr.row64 {
        height: 13pt
    }

    table.sheet0 tr.row65 {
        height: 13pt
    }

    table.sheet0 tr.row66 {
        height: 13pt
    }

    table.sheet0 tr.row67 {
        height: 13pt
    }

    table.sheet0 tr.row68 {
        height: 13pt
    }
    </style>
</head>

<body>
    <style>
    @page {
        margin-left: 0.7in;
        margin-right: 0.7in;
        margin-top: 0.75in;
        margin-bottom: 0.75in;
    }

    body {
        margin-left: 0.7in;
        margin-right: 0.7in;
        margin-top: 0.75in;
        margin-bottom: 0.75in;
    }
    </style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <tbody>
            
            <tr class="row2">
                <td class="column0 style15 s style15" colspan="11">BHAVANI SHIPPING SERVICES (I) PVT. LTD.</td>
                <td class="column11 style1 s"></td>
            </tr>
            <tr class="row3">
                <td class="column0 style16 s style16" colspan="11">REGD. OFF : 601/602/603, V-Times Square, Plot no:-
                    03,</td>
                <td class="column11 style2 s">
                    <div style="position: relative;"><img
                            style="position: absolute; z-index: 1; left: 0px; top: 0px; width: 98px; height: 92px;"
                            src="/assets/img/logo_icon.png"
                            border="0" /></div>
                </td>
            </tr>
            <tr class="row4">
                <td class="column0 style16 s style16" colspan="11">Sector-15, CBD Belapur, Navi Mumbai – 400614.</td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row5">
                <td class="column0 style16 s style16" colspan="11">Tel :022 4270 4293/296 Fax: 022 4270 4290</td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row6">
                <td class="column0 style16 s style16" colspan="11">Website : www.bhavanigroups.com</td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row7">
                <td class="column0 style16 s style16" colspan="11">csupport@bhavani.com</td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row8">
                <td class="column0 style17 s style17" colspan="11">CIN - U61100MH2007PTC175958 / GSTIN - 27AADCB2777K1ZD
                </td>
                <td class="column11 style3 s"></td>
            </tr>
            <tr class="row9">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row10">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row11">
                <td class="column0 style19 s style19" colspan="12">TAX INVOICE - ORIGINAL FOR RECIPIENT</td>
            </tr>
            <tr class="row12">
                <td class="column0 style20 s style20" colspan="6">INVOICE.NO. : MUM/0245/23-24</td>
                <td class="column6 style21 s style21" colspan="6">INVOICE DATE:05/08/2023</td>
            </tr>
            <tr class="row13">
                <td class="column0 style20 s style20" colspan="6">STATE: Maharashtra STATE CODE: 27</td>
                <td class="column6 style21 s style21" colspan="6"></td>
            </tr>
            <tr class="row14">
                <td class="column0 style20 s style20" colspan="6">PERIOD. : From 01/07/2023 To:31/07/2023</td>
                <td class="column6 style21 s style21" colspan="6">INVOICE TYPE:REPAIR</td>
            </tr>
            <tr class="row15">
                <td class="column0 style20 s style20" colspan="6"></td>
                <td class="column6 style21 s style21" colspan="6"></td>
            </tr>
            <tr class="row16">
                <td class="column0 style22 s style22" colspan="6">BUYER'S DETAILS(BILLED TO)</td>
                <td class="column6 style23 s style23" colspan="6">ON ACCOUNT OF</td>
            </tr>
            <tr class="row17">
                <td class="column0 style4 s">M/S:</td>
                <td class="column1 style24 s style24" colspan="5">HIND TERMINALS PRIVATE LTD.</td>
                <td class="column6 style5 s">M/S:</td>
                <td class="column7 style25 s style25" colspan="5">MSC AGENCY(INDIA) PVT. LTD. ,</td>
            </tr>
            <tr class="row18">
                <td class="column0 style28 s style28">Address:</td>
                <td class="column1 style26 s style26" colspan="5">SECTOR 10, DRONAGIRI, NAVI MUMBAI, MAHARASHTRA 400707
                </td>
                <td class="column6 style29 s style29">Address:</td>
                <td class="column7 style27 s style27" colspan="5">MSC HOUSE, ANDHERI KURLA ROAD, ANDHERI (E),
                    MUMBAI-400059, INDIA</td>
            </tr>
            <tr class="row22">
                <td class="column0 style30 s style30" colspan="3">GSTIN: 27AABCH4778A1ZP</td>
                <td class="column3 style24 s style24" colspan="3">PAN No: AABCH4778A</td>
                <td class="column6 style31 s style31" colspan="3">GSTIN: 27AACCM7663A2ZK</td>
                <td class="column9 style25 s style25" colspan="3">PAN No: AACCM7663A</td>
            </tr>
            <tr class="row23">
                <td class="column0 style30 s style30" colspan="3">STATE: MAHARASHTRA</td>
                <td class="column3 style24 s style24" colspan="3">STATE CODE: 27</td>
                <td class="column6 style31 s style31" colspan="3">STATE: MAHARASHTRA</td>
                <td class="column9 style25 s style25" colspan="3">STATE CODE: 27</td>
            </tr>
            <tr class="row24">
                <td class="column0 style20 s style20" colspan="6">PLACE OF SUPPLY: MAHARASHTRA</td>
                <td class="column6 style21 s style21" colspan="6"></td>
            </tr>
            <tr class="row25">
                <td class="column0 style6 s">SR#</td>
                <td class="column1 style32 s style32" colspan="5">Description</td>
                <td class="column6 style7 s">SAC Code</td>
                <td class="column7 style33 s style33" colspan="2">LabourCost</td>
                <td class="column9 style33 s style33" colspan="2">MaterialCost</td>
                <td class="column11 style9 s">Amount</td>
            </tr>
            <tr class="row26">
                <td class="column0 style6 s"></td>
                <td class="column1 style32 s style32" colspan="5"></td>
                <td class="column6 style8 s"></td>
                <td class="column7 style33 s style33" colspan="2"></td>
                <td class="column9 style33 s style33" colspan="2"></td>
                <td class="column11 style9 s"></td>
            </tr>
            <tr class="row27">
                <td class="column0 style14 s"></td>
                <td class="column1 style34 s style36" colspan="11"></td>
            </tr>
            <tr class="row28">
                <td class="column0 style10 s">01.00</td>
                <td class="column1 style37 s style37" colspan="5">LABOUR CHARGES</td>
                <td class="column6 style11 s">9987.00</td>
                <td class="column7 style38 n style38" colspan="2">8856.25</td>
                <td class="column9 style38 n style38" colspan="2">00.00</td>
                <td class="column11 style12 n">[&amp;gt;9999999]8,856.25</td>
            </tr>
            <tr class="row29">
                <td class="column0 style10 s">02.00</td>
                <td class="column1 style37 s style37" colspan="5">MATERIAL CHARGES</td>
                <td class="column6 style11 s">9987.00</td>
                <td class="column7 style38 n style38" colspan="2">00.00</td>
                <td class="column9 style38 n style38" colspan="2">1126187.12</td>
                <td class="column11 style12 n">[&amp;gt;9999999]1,126,187.12</td>
            </tr>
            <tr class="row30">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row31">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5">Discount on Labour (5RS)</td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 f style38" colspan="2">681.25</td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style94 f">[&amp;gt;9999999]681.25</td>
            </tr>
            <tr class="row32">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5">Discount on Machinary</td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style94 n">[&amp;gt;9999999]5,725.00</td>
            </tr>
            <tr class="row33">
                <td class="column0 style10 s"></td>
                <td class="column1 style95 s style37" colspan="5">10% Discount on Structure</td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style94 n">0.00</td>
            </tr>
            <tr class="row34">
                <td class="column0 style10 s"></td>
                <td class="column1 style95 s style37" colspan="5">Amount After Discount</td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style96 f">1128637.12</td>
            </tr>
            <tr class="row35">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style97 null"></td>
            </tr>
            <tr class="row36">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row37">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row38">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row39">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row40">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row41">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row42">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row43">
                <td class="column0 style10 s"></td>
                <td class="column1 style37 s style37" colspan="5"></td>
                <td class="column6 style11 s"></td>
                <td class="column7 style38 null style38" colspan="2"></td>
                <td class="column9 style38 null style38" colspan="2"></td>
                <td class="column11 style12 null"></td>
            </tr>
            <tr class="row44">
                <td class="column0 style38 s style38" colspan="11">GROSS TOTAL :</td>
                <td class="column11 style12 f">[&amp;gt;9999999]1,128,637.12</td>
            </tr>
            <tr class="row45">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row46">
                <td class="column0 style22 s style22" colspan="7">APPLICABLE GST RATES</td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row47">
                <td class="column0 style39 s style39" colspan="2">HSN/SAC Code</td>
                <td class="column2 style12 s">Amount</td>
                <td class="column3 style12 s">SGST(%)</td>
                <td class="column4 style12 s">SGST Amt.</td>
                <td class="column5 style12 s">CGST(%)</td>
                <td class="column6 style12 s">CGST Amt.</td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row48">
                <td class="column0 style39 s style39" colspan="2">9987.00</td>
                <td class="column2 style12 f">[&amp;gt;9999999]1,128,637.12</td>
                <td class="column3 style12 n">[&amp;gt;9999999]9.00</td>
                <td class="column4 style12 f">[&amp;gt;9999999]101,577.34</td>
                <td class="column5 style12 n">[&amp;gt;9999999]9.00</td>
                <td class="column6 style12 f">[&amp;gt;9999999]101,577.34</td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style2 s"></td>
            </tr>
            <tr class="row49">
                <td class="column0 style39 s style39" colspan="2"></td>
                <td class="column2 style12 s"></td>
                <td class="column3 style12 s"></td>
                <td class="column4 style12 s"></td>
                <td class="column5 style12 s"></td>
                <td class="column6 style12 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style37 s style37" colspan="2">Amount Before Tax</td>
                <td class="column11 style12 f">[&amp;gt;9999999]1,128,637.12</td>
            </tr>
            <tr class="row50">
                <td class="column0 style39 s style39" colspan="2"></td>
                <td class="column2 style12 s"></td>
                <td class="column3 style12 s"></td>
                <td class="column4 style12 s"></td>
                <td class="column5 style12 s"></td>
                <td class="column6 style12 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style37 s style37" colspan="2">Add GST</td>
                <td class="column11 style12 f">[&amp;gt;9999999]203,154.68</td>
            </tr>
            <tr class="row51">
                <td class="column0 style39 s style39" colspan="2"></td>
                <td class="column2 style12 s"></td>
                <td class="column3 style12 s"></td>
                <td class="column4 style12 s"></td>
                <td class="column5 style12 s"></td>
                <td class="column6 style12 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style37 s style37" colspan="2">Round Off</td>
                <td class="column11 style12 n">[&amp;gt;9999999]0.20</td>
            </tr>
            <tr class="row52">
                <td class="column0 style39 s style39" colspan="2">TOTALS</td>
                <td class="column2 style12 f">[&amp;gt;9999999]1,128,637.12</td>
                <td class="column3 style12 s"></td>
                <td class="column4 style12 f">[&amp;gt;9999999]101,577.34</td>
                <td class="column5 style12 s"></td>
                <td class="column6 style12 f">[&amp;gt;9999999]101,577.34</td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style37 s style37" colspan="2">Final Invoice Amount</td>
                <td class="column11 style12 f">[&amp;gt;9999999]1,331,792.00</td>
            </tr>
            <tr class="row53">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row54">
                <td class="column0 style40 s style40" colspan="12">INVOICE AMOUNT(IN WORDS)</td>
            </tr>
            <tr class="row55">
                <td class="column0 style40 s style40" colspan="12">Rupees : Thirteen Lakh thirty-nine thousand three
                    hundred and fifty-one</td>
            </tr>
            <tr class="row56">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row57">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row58">
                <td class="column0 style41 s style41" colspan="12">For BHAVANI SHIPPING SERVICES (I) PVT LTD.</td>
            </tr>
            <tr class="row59">
                <td class="column0 style42 s style42" colspan="6">E.&amp; O.E. Terms &amp; Condition</td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style13 s"></td>
            </tr>
            <tr class="row60">
                <td class="column0 style43 s style43" colspan="6"></td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style13 s"></td>
            </tr>
            <tr class="row61">
                <td class="column0 style43 s style43" colspan="6">* Interest @ rate of 24% per annum will be charged of
                    bills remaining unpaid after due.</td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style13 s"></td>
            </tr>
            <tr class="row62">
                <td class="column0 style43 s style43" colspan="6">* Incase of any queries please intimate us within 5
                    working days.</td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style13 s"></td>
            </tr>
            <tr class="row63">
                <td class="column0 style43 s style43" colspan="6">* Kindly check all the details of Invoice carefully to
                    avoid un- necessary complications.</td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style0 s"></td>
                <td class="column11 style13 s"></td>
            </tr>
            <tr class="row64">
                <td class="column0 style44 s style44" colspan="6">* Subject to Mumbai Jurisdiction.</td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style45 s style45" colspan="2">Authorised Signatory</td>
            </tr>
            <tr class="row65">
                <td class="column0 style44 s style44" colspan="6">* This Is A System Generated Invoice</td>
                <td class="column6 style0 s"></td>
                <td class="column7 style0 s"></td>
                <td class="column8 style0 s"></td>
                <td class="column9 style0 s"></td>
                <td class="column10 style45 s style45" colspan="2"></td>
            </tr>
            <tr class="row66">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row67">
                <td class="column0 style18 s style18" colspan="12"></td>
            </tr>
            <tr class="row68">
                <td class="column0 style46 s style46" colspan="12"></td>
            </tr>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>