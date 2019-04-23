import React from 'react'
import { render } from 'react-dom';
import { BrowserRouter } from 'react-router-dom';

import App from './components/App'
import Home from './components/Home'
import Login from './components/Login'
import Register from './components/Register'
import Test from './components/Test'
import NotFound from './components/NotFound'

import {
  BrowserRouter as Router,
  Route,
  Link,
  Switch
} from 'react-router-dom'

render((
  <BrowserRouter>
  <Router>
    <App >
      <Switch>
        <Route exact path="/" component={Home}/>
        <Route exact path="/login" component={Login}/>
        <Route exact path="/register" component={Register}/>
        <Route exact path="/test" component={Test}/>

        <Route component={NotFound}/>
      </Switch>
    </App>
  </Router>
  </BrowserRouter>
), document.getElementById('app'));
