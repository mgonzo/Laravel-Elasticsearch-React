var NavigationList = React.createClass({
  getInitialState: function (){
    return {
      'links': ['one', 'two', 'three']
    };
  },

  render: function () {
    return (
      <ul style={this.props.style}> {
        this.state.links.map(function (link, index) {
          return <li>{ link }</li>;
        })
      } </ul>
    );
  }
});


var Navigation = React.createClass({
  getInitialState: function () {
    return {
      display: 'none'
    };
  },

  componentDidMount: function () {
  },

  clickHeader: function (event) {
    if (this.state.display === 'none') {
      this.setState({
        display: 'block'
      });
    } else {
      this.setState({
        display: 'none'
      });
    }
  },

  render: function() {
    var self = this;

    return (
          <span>
            <header onClick={this.clickHeader}>Sections</header>
            {React.cloneElement(<NavigationList />, {style: {display: this.state.display }})}
          </span>
    );
  }
});

ReactDOM.render(
    <Navigation/>, 
    document.getElementById('navigation')
);



