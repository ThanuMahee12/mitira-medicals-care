import React, { memo } from 'react';
import PropTypes from 'prop-types';

const Footer = () => {
    return (
        <footer class='w-100 bg-dark text-white clearfix'>
            <div class="container-fluid">
                <div class="row border-bottom-1 border-secondary">
                    <div class="col-md-4 d-flex flex-column align-items-center  mt-4"><i class="fa fa-envelope" aria-hidden="true"></i><a href="" class="text-decoration-none text-white h5" target="_blank">Ayush@gmail.com</a></div>
                    <div class="col-md-4 d-flex flex-column align-items-center  mt-4"><i class="fa fa-phone" aria-hidden="true"></i><a href="#" class="text-decoration-none text-white h5" target="_blank">0778967589</a></div>
                    <div class="col-md-4 d-flex flex-column align-items-center text-center mt-4"><i class="fas fa-hospital"></i>
                        <a href="" class="text-decoration-none text-white h5" target="_blank">No,02,RajaVeethy,<br />Nallur,<br />Jaffna
                    </a>
                </div>
                </div>
                    © 2021 Copyright:
                    <a class="text-white fw-bold" href="https://mdbootstrap.com">Ayushcare.com</a>
                </div>
            </div>
</footer >
    );
}

Footer.propTypes = {};

export default memo(Footer);
