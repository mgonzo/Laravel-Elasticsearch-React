var Message = React.createClass({


  componentDidMount: function () {
  },

  render: function() {
    var self = this;

    return (
        <div> 
          Hello, 
          {this.props.title} 
        </div>
    );
  }
});

ReactDOM.render(
    <Message />, 
    document.getElementById('message')
);
