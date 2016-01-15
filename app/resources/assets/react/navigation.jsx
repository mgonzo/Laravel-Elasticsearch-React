var NavigationList = React.createClass({

  render: function () {
    return (
      <ul style={this.props.style}> {
        this.props.links.map(function (link, index) {
          return <li><a href={link[0]}>{ link[1] }</a></li>;
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
  //componentDidMount: function () { },
  
  clickHeader: function (e){
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
    return (
          <span>
            <header onClick={this.clickHeader}>Sections</header>
            { React.cloneElement(<NavigationList />, {links: this.props.links, style: {display: this.state.display, position: 'absolute'}}) }
          </span>
    );
  }
});

