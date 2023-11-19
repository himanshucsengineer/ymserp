<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
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
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style0 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style1 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style1 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style2 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style2 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style3 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style3 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style4 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style4 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style5 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style5 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style6 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style6 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style7 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style7 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style8 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style8 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style9 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style9 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style10 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style10 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style11 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style11 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style12 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style12 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style13 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style13 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style14 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style14 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style15 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style15 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style16 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style16 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style17 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style17 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style18 {
        vertical-align: top;
        text-align: left;
        padding-left: 9px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style18 {
        vertical-align: top;
        text-align: left;
        padding-left: 9px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style19 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style19 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style20 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style20 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style21 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style21 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style22 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style22 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style23 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style23 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style24 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style24 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style25 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style25 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style26 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style26 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style27 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style27 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style28 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style28 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style29 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style29 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style30 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style30 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style31 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style31 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style32 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style32 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style33 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style33 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style34 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style34 {
        vertical-align: bottom;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style35 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style35 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style36 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style36 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style37 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style37 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style38 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    th.style38 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Times New Roman';
        font-size: 10pt;
        background-color: white
    }

    td.style39 {
        vertical-align: top;
        text-align: left;
        padding-left: 27px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style39 {
        vertical-align: top;
        text-align: left;
        padding-left: 27px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style40 {
        vertical-align: top;
        text-align: left;
        padding-left: 27px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style40 {
        vertical-align: top;
        text-align: left;
        padding-left: 27px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style41 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style41 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style42 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style42 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style43 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style43 {
        vertical-align: top;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style44 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style44 {
        vertical-align: top;
        text-align: right;
        padding-right: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style45 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style45 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style46 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style46 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style47 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style47 {
        vertical-align: middle;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: 1px solid #000000 !important;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style48 {
        vertical-align: bottom;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style48 {
        vertical-align: bottom;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style49 {
        vertical-align: bottom;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style49 {
        vertical-align: bottom;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style50 {
        vertical-align: bottom;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style50 {
        vertical-align: bottom;
        text-align: right;
        padding-right: 0px;
        border-bottom: none #000000;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style51 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style51 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style52 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style52 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    td.style53 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    th.style53 {
        vertical-align: bottom;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: 1px solid #000000 !important;
        font-weight: bold;
        color: #000000;
        font-family: 'Carlito';
        font-size: 7.5pt;
        background-color: white
    }

    table.sheet0 col.col0 {
        width: 36.59999958pt
    }

    table.sheet0 col.col1 {
        width: 62.35555484pt
    }

    table.sheet0 col.col2 {
        width: 46.08888836pt
    }

    table.sheet0 col.col3 {
        width: 48.79999944pt
    }

    table.sheet0 col.col4 {
        width: 46.76666613pt
    }

    table.sheet0 col.col5 {
        width: 50.15555498pt
    }

    table.sheet0 col.col6 {
        width: 50.15555498pt
    }

    table.sheet0 col.col7 {
        width: 81.3333324pt
    }

    table.sheet0 col.col8 {
        width: 80.65555463pt
    }

    table.sheet0 col.col9 {
        width: 65.06666592pt
    }

    table.sheet0 tr {
        height: 13.636363636364pt
    }

    table.sheet0 tr.row0 {
        height: 87pt
    }

    table.sheet0 tr.row1 {
        height: 12.5pt
    }

    table.sheet0 tr.row2 {
        height: 34.5pt
    }

    table.sheet0 tr.row3 {
        height: 12pt
    }

    table.sheet0 tr.row4 {
        height: 56.25pt
    }

    table.sheet0 tr.row5 {
        height: 12pt
    }

    table.sheet0 tr.row6 {
        height: 12pt
    }

    table.sheet0 tr.row7 {
        height: 12pt
    }

    table.sheet0 tr.row8 {
        height: 12pt
    }

    table.sheet0 tr.row9 {
        height: 12.75pt
    }

    table.sheet0 tr.row10 {
        height: 12pt
    }

    table.sheet0 tr.row11 {
        height: 12pt
    }

    table.sheet0 tr.row12 {
        height: 12pt
    }

    table.sheet0 tr.row13 {
        height: 12pt
    }

    table.sheet0 tr.row14 {
        height: 12pt
    }

    table.sheet0 tr.row15 {
        height: 12pt
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
        height: 12pt
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
        height: 23.25pt
    }

    table.sheet0 tr.row36 {
        height: 69pt
    }

    table.sheet0 tr.row37 {
        height: 12pt
    }

    table.sheet0 tr.row38 {
        height: 36pt
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

    <button class="no-print" onclick="printPage()">Print Page</button>
   
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
        <tbody>
            <tr class="row0">
                <td class="column0 style1 s style3" colspan="10"> http://www.bhavanigroups.com<span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:12pt"><br>BHAVANI
                        SHIPPING SERVICES (I) PVT. LTD.<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">REGD. OFF : 601/602/603,
                        V-Times Square, Plot no:- 03, Sector-15, CBD Belapur, Navi Mumbai – 400614.<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">TEL : 022 4270 4293/ 296
                        , 9820241098 FAX : 022 4270 4290<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Website :
                        www.bhavanigroups.com<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">EMAIL :
                        csupport@bhavani.com , emptypark.mum@bhavani.com CIN : U61100MH2007PTC175958 GSTN :
                        27AADCB2777K1ZD</span></a></td>
            </tr>
            <tr class="row1">
                <td class="column0 style5 s style7" colspan="10"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">TAX INVOICE -
                        ORIGINAL FOR RECIPIENT</span></td>
            </tr>
            <tr class="row2">
                <td class="column0 style8 s style10" colspan="6"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">INVOICE.NO. :
                        Y1/11-2023/00165<br />
                    </span><span style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">STATE :
                        <?php echo $invoice_data['line_state']?> STATE CODE : <?php echo $invoice_data['line_state_code']?> </span></td>
                <td class="column6 style11 s style13" colspan="4"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">INVOICE
                        DATE: <?php echo date('d-m-Y')?><br />
                    </span><span style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">INVOICE
                        TYPE: <?php echo $invoice_data['invoice_type']?></span></td>
            </tr>
            <tr class="row3">
                <td class="column0 style5 s style7" colspan="6"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">BUYER'S
                        DETAILS(BILLED TO)</span></td>
                <td class="column6 style5 s style7" colspan="4"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">ON ACCOUNT
                        OF</span></td>
            </tr>
            <tr class="row4">
                <td class="column0 style8 s style10" colspan="6"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">M/S: <?php echo $invoice_data['buyer_name']?><br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Address:
                        <?php echo $invoice_data['buyer_address']?><br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">GSTIN: <?php echo $invoice_data['buyer_gst']?>
                        PAN No: <?php echo $invoice_data['buyer_pan']?><br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">STATE: <?php echo $invoice_data['buyer_state']?> STATE
                        CODE: <?php echo $invoice_data['buyer_state_code']?></span></td>
                <td class="column6 style8 s style10" colspan="4"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">M/S: <?php echo $invoice_data['line_name']?><br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Address: <?php echo $invoice_data['line_address']?><br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">GSTIN: <?php echo $invoice_data['line_gst']?>
                        PAN No: <?php echo $invoice_data['line_pan']?><br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">STATE: <?php echo $invoice_data['line_state']?> STATE
                        CODE: <?php echo $invoice_data['line_state_code']?></span></td>
            </tr>
            <tr class="row5">
                <td class="column0 style4 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">SR#</span></td>
                <td class="column1 style14 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">ContainerNo.</span>
                </td>
                <td class="column2 style14 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Size/Type</span>
                </td>
                <td class="column3 style15 s style17" colspan="3"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Description</span>
                </td>
                <td class="column6 style18 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">SAC Code</span>
                </td>
                <td class="column7 style4 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Quantity</span>
                </td>
                <td class="column8 style19 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Rate</span></td>
                <td class="column9 style19 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Amount</span>
                </td>
            </tr>
            <tr class="row6">
                <td class="column0 style20 null"></td>
                <td class="column1 style15 s style17" colspan="9"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Being the amt.
                        debited for LIFT-OFF of Containers At BHAVANI 1</span></td>
            </tr>
            <tr class="row7">
                <td class="column0 style21 n">1</td>
                <td class="column1 style22 s"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt"><?php echo $invoice_data['container_no'] ?></span></td>
                <td class="column2 style22 s"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt"><?php echo $invoice_data['container_size'] ?><?php echo $invoice_data['sub_type'] ?></span></td>
                <td class="column3 style23 s style25" colspan="3"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">CONTAINER <?php echo $invoice_data['invoice_type'] ?> CHARGES</span>
                </td>
                <td class="column6 style26 n"><?php echo $invoice_data['hsn_code'] ?></td>
                <td class="column7 style27 n"><?php echo $invoice_data['quantity'] ?></td>
                <td class="column8 style28 n"><?php echo $invoice_data['amount'] ?></td>
                <td class="column9 style28 n"><?php echo $invoice_data['amount'] ?></td>
            </tr>
            <tr class="row8">
                <td class="column0 style20 null"></td>
                <td class="column1 style20 null"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style29 null style31" colspan="3"></td>
                <td class="column6 style20 null"></td>
                <td class="column7 style20 null"></td>
                <td class="column8 style20 null"></td>
                <td class="column9 style20 null"></td>
            </tr>
            <tr class="row9">
                <td class="column0 style20 null"></td>
                <td class="column1 style20 null"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style29 null style31" colspan="3"></td>
                <td class="column6 style20 null"></td>
                <td class="column7 style20 null"></td>
                <td class="column8 style20 null"></td>
                <td class="column9 style20 null"></td>
            </tr>
            <tr class="row10">
                <td class="column0 style20 null"></td>
                <td class="column1 style20 null"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style29 null style31" colspan="3"></td>
                <td class="column6 style20 null"></td>
                <td class="column7 style20 null"></td>
                <td class="column8 style20 null"></td>
                <td class="column9 style20 null"></td>
            </tr>
            <tr class="row11">
                <td class="column0 style20 null"></td>
                <td class="column1 style20 null"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style29 null style31" colspan="3"></td>
                <td class="column6 style20 null"></td>
                <td class="column7 style20 null"></td>
                <td class="column8 style20 null"></td>
                <td class="column9 style20 null"></td>
            </tr>
            
            
            
            
            <tr class="row22">
                <td class="column0 style32 null style34" colspan="10"></td>
            </tr>
            <tr class="row23">
                <td class="column0 style5 s style7" colspan="7"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">APPLICABLE GST
                        RATES</span></td>
                <td class="column7 style36 null style38" colspan="3" rowspan="3"></td>
            </tr>
            <tr class="row24">
                <td class="column0 style39 s style40" colspan="2"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">HSN/SAC
                        Code</span></td>
                <td class="column2 style41 s"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Amount</span></td>
                <td class="column3 style41 s"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">SGST(%)</span></td>
                <td class="column4 style41 s"><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">SGST
                        Amt.</span></td>
                <td class="column5 style41 s"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">CGST(%)</span></td>
                <td class="column6 style41 s"><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">CGST
                        Amt.</span></td>
            </tr>
            <tr class="row25">
                <td class="column0 style42 n style43" colspan="2"><?php echo $invoice_data['hsn_code'] ?></td>
                <td class="column2 style44 n"><?php echo $invoice_data['amount'] ?></td>
                <td class="column3 style28 n">9.00</td>
                <td class="column4 style28 n"><?php echo $invoice_data['sgst'] ?></td>
                <td class="column5 style28 n">9.00</td>
                <td class="column6 style28 n"><?php echo $invoice_data['cgst'] ?></td>
            </tr>
            <tr class="row26">
                <td class="column0 style29 null style31" colspan="2"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style20 null"></td>
                <td class="column4 style20 null"></td>
                <td class="column5 style20 null"></td>
                <td class="column6 style20 null"></td>
                <td class="column7 style35 null style35" rowspan="4"></td>
                <td class="column8 style22 s"><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Amount
                        Before Tax</span></td>
                <td class="column9 style44 n"><?php echo $invoice_data['amount'] ?></td>
            </tr>
            <tr class="row27">
                <td class="column0 style29 null style31" colspan="2"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style20 null"></td>
                <td class="column4 style20 null"></td>
                <td class="column5 style20 null"></td>
                <td class="column6 style20 null"></td>
                <td class="column8 style22 s"><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Add
                        GST</span></td>
                <td class="column9 style28 n"><?php echo $invoice_data['totalgst'] ?></td>
            </tr>
            <tr class="row28">
                <td class="column0 style29 null style31" colspan="2"></td>
                <td class="column2 style20 null"></td>
                <td class="column3 style20 null"></td>
                <td class="column4 style20 null"></td>
                <td class="column5 style20 null"></td>
                <td class="column6 style20 null"></td>
                <td class="column8 style22 s"><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Round
                        Oﬀ</span></td>
                <td class="column9 style28 n">0.00</td>
            </tr>
            <tr class="row29">
                <td class="column0 style5 s style7" colspan="2"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">TOTALS</span>
                </td>
                <td class="column2 style44 n"><?php echo $invoice_data['amount'] ?></td>
                <td class="column3 style20 null"></td>
                <td class="column4 style28 n"><?php echo $invoice_data['sgst'] ?></td>
                <td class="column5 style20 null"></td>
                <td class="column6 style28 n"><?php echo $invoice_data['cgst'] ?></td>
                <td class="column8 style22 s"><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">Final
                        Invoice Amount</span></td>
                <td class="column9 style44 n"><?php echo $invoice_data['final_amount'] ?></td>
            </tr>
            <tr class="row30">
                <td class="column0 style29 null style31" colspan="10"></td>
            </tr>
            <tr class="row31">
                <td class="column0 style15 s style17" colspan="10"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">INVOICE
                        AMOUNT(IN WORDS)</span></td>
            </tr>
            <tr class="row32">
                <td class="column0 style15 s style17" colspan="10"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">RUPEES : <?php echo $invoice_data['final_amount_in_words'] ?> only</span></td>
            </tr>
            <tr class="row33">
                <td class="column0 style29 null style31" colspan="10"></td>
            </tr>
            <tr class="row34">
                <td class="column0 style15 s style17" colspan="10"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">MODE OF PAYMENT
                        : CASH</span></td>
            </tr>
            <tr class="row35">
                <td class="column0 style45 s style47" colspan="10"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">For BHAVANI
                        SHIPPING SERVICES (I) PVT LTD.</span></td>
            </tr>
            <tr class="row36">
                <td class="column0 style8 s style10" colspan="6"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">E.&amp;O.E.
                        Terms &amp; Condition<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">* Interest @ rate of 24%
                        per annum will be charged of bills remaining unpaid aGer due.<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">* Incase of any queries
                        please intimate us within 5 working days.<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">* Kindly check all the
                        details of Invoice carefully to avoid un- necessary complications.<br />
                    </span><span style="color:#000000; font-family:'Carlito'; font-size:7.5pt">* Subject to Mumbai
                        Jurisdiction.</span></td>
                <td class="column6 style48 s style50" colspan="4" rowspan="2"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Authorised
                        Signatory</span></td>
            </tr>
            <tr class="row37">
                <td class="column0 style23 s style25" colspan="6"><span
                        style="color:#000000; font-family:'Carlito'; font-size:7.5pt">* This Is A System Generated
                        Invoice</span></td>
            </tr>
            <tr class="row38">
                <td class="column0 style51 s style53" colspan="10"><span
                        style="font-weight:bold; color:#000000; font-family:'Carlito'; font-size:7.5pt">Page 1 Of
                        1</span></td>
            </tr>
        </tbody>
    </table>

    <script>
    function printPage() {
            // Hide the button before printing
            document.querySelector('.no-print').style.display = 'none';

            // Print the page
            window.print();

            // Show the button after printing
            document.querySelector('.no-print').style.display = 'block';
        }
    </script>
</body>

</html>