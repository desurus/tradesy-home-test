/**
 * Created by okryshch on 12/20/15.
 */

var TRADESYHOMETEST = TRADESYHOMETEST || {};

TRADESYHOMETEST = function(){
    var ItemForm = React.createClass({
        render: function() {
            return (
                <div className="row">
                    <div className="col-md-4">
                        <img src={this.state.image} className="img-responsive img-thumbnail" alt=""/>
                    </div>
                    <div className="col-md-8">
                        <form className="form-horizontal" onSubmit={this.handleItemSubmit} encType="multipart/form-data">
                            <div className="form-group">
                                <label htmlFor="title" className="col-sm-2 control-label">Title</label>
                                <div className="col-sm-10">
                                    <input type="text" className="form-control" id="title" value={this.state.title}
                                           onChange={this.handleTitleChange}/>
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="desc" className="col-sm-2 control-label">Description</label>
                                <div className="col-sm-10">
                                    <textarea className="form-control" rows="3" id="desc"
                                              onChange={this.handleDescChange}
                                              value={this.state.desc}></textarea>
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="price" className="col-sm-2 control-label">Price</label>
                                <div className="col-sm-3">
                                    <input type="number" min="1" className="form-control" id="price" value={this.state.price}
                                    onChange={this.handlePriceChange}/>
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="image" className="col-sm-2 control-label">Image</label>
                                <div className="col-sm-10">
                                    <input type="file" className="form-control" id="image" defaultValue=""
                                    onChange={this.handleImageChange}/>
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="color" className="col-sm-2 control-label">Color</label>
                                <div className="col-sm-3">
                                    <input type="text" className="form-control" id="color" value={this.state.color}
                                    onChange={this.handleColorChange}/>
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="condition" className="col-sm-2 control-label" >Condition</label>
                                <div className="col-sm-3">
                                    <select className="form-control" value={this.state.condition}
                                            onChange={this.handleCondChange}>
                                        <option value="new">New</option>
                                        <option value="used">Used</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div className="form-group">
                                <div className="col-sm-offset-2 col-sm-10">
                                    <button type="submit" className="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            );
        },
        getInitialState: function() {
            return {
                title: '',
                desc: '',
                price: '',
                image: '/images/placeholder.png',
                color: '',
                condition: 'new',
                status: 'success'
            }
        },
        handleTitleChange: function(e) {
            this.setState({title: e.target.value});
        },
        handleDescChange: function(e) {
            this.setState({desc: e.target.value});
        },
        handlePriceChange: function(e) {
            this.setState({price: e.target.value});
        },
        handleImageChange: function(e) {
            var self = this;
            var reader = new FileReader();
            var file = e.target.files[0];

            reader.onload = function(upload) {
                self.setState({
                    image: upload.target.result
                });
            };

            reader.readAsDataURL(file);
        },
        handleColorChange: function(e) {
            this.setState({color: e.target.value});
        },
        handleCondChange: function(e) {
            this.setState({condition: e.target.value});
        },
        handleItemSubmit: function(e) {
            e.preventDefault();
            var title = this.state.title.trim();
            var desc = this.state.desc.trim();
            var price = this.state.price.trim();
            var image = this.state.image.trim();
            var color = this.state.color.trim();
            var condition = this.state.condition.trim();

            // TODO validate input
            if (!title || !desc || !price || !image || !color || !condition) {
                this.setState({
                    title: title,
                    desc: desc,
                    price: price,
                    image: image,
                    color: color,
                    condition: condition,
                    status: 'failure'
                });
                this.props.setErrors([{message: "Some fields are missing. All fields are required.", id: 1}]);
                return;
            }

            this.postToServer({
                title: title,
                desc: desc,
                price: price,
                image: image,
                color: color,
                condition: condition
            });

            this.setState({
                title: '',
                desc: '',
                price: '',
                image: '/images/placeholder.png',
                color: '',
                condition: 'new',
                status: 'success'
            });
            this.props.setErrors([]);
        },
        postToServer: function(new_item) {
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: new_item,
                contentType: "multipart/form-data",
                success: function(data) {
                    this.setState({data: data});
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }.bind(this)
            });
        }
    });

    var ErrorMessage = React.createClass({
        render: function(){
            var errorsArray = this.props.data.map(function(singleError){
                return (
                    <p key={singleError.id}>{singleError.message}</p>
                );
            });
            if (errorsArray.length != 0) {
                return (
                    <div className="alert alert-danger" role="alert">
                        {errorsArray}
                    </div>

                );
            } else {
                return (
                    <div></div>
                );
            }
        }
    });

    var AddEditPage = React.createClass({
        getInitialState: function() {
            return {
                title: '',
                desc: '',
                price: '',
                image: '/images/placeholder.png',
                color: '',
                condition: 'new',
                errors: [],
                status: 'success'
            }
        },
        setValidationErrors: function(errors) {
            this.setState({errors: errors});
        },
        render: function(){
            return (
                <div>
                    <div className="page-header">
                        <h1>Add new item</h1>
                    </div>
                    <ErrorMessage data={this.state.errors}/>
                    <ItemForm setErrors={this.setValidationErrors}/>
                </div>
            );
        }
    });

    ReactDOM.render(
        <AddEditPage />,
        document.getElementById('item_page')
    );
}();