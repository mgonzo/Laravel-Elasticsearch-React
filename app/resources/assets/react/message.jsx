var Message = React.createClass({

  clicked: function (e){
    console.log(e.target);
    console.log('I feel much better, now.');
  },

  style: {
    display: 'none'
  },

  render: function() {
    return (
        <div onClick={this.clicked} style={this.style}>
          Just what do you think youre you doing {this.props.title}
        </div>
    );
  }
});
