import React, { Component } from 'react'
import { Link } from 'react-router-dom';


class Test extends Component {
  render () {
    return (
     <section>
     		<h2>Test</h2>
        <div className='logo' />
        <div className='title' />
        <ul>
        	 <Link to="/">Home</Link>
        	 <Link to="/test">Test</Link>
        </ul>
        <div className='subtitle'><p>Test AdonisJs simplicity will make you feel confident about your code</p></div>
      </section>
    )
  }
}

export default Test;
