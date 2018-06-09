import React from 'react';
import ReactDom from 'react-dom';

import Header from './header.js';
import Footer from './footer.js';

import Main from './main.js';



ReactDom.render(<Header/>, document.getElementById("header"));
ReactDom.render(<Footer/>, document.getElementById("footer"));

ReactDom.render(<Main/>, document.getElementById("app"));