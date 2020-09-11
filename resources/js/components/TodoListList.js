import axios from 'axios';
import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class TodoListList extends Component {
    constructor () {
        super()
        this.state = {
            projects: []
        }
    }

    componentDidMount () {
        axios.get('/api/projects').then
    }
}