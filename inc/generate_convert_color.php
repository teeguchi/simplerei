<?php
/**
 * Convert to generate color
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

/* HEX to RGB.
 */
if ( ! function_exists( 'simplerei_hex2rgb' ) ) {
	function simplerei_hex2rgb( $hex_color ) {
		$hex_color = trim( $hex_color, '#' );

		if ( strlen( $hex_color ) === 3 ) {
			$r = hexdec( substr( $hex_color, 0, 1 ) . substr( $hex_color, 0, 1 ) );
			$g = hexdec( substr( $hex_color, 1, 1 ) . substr( $hex_color, 1, 1 ) );
			$b = hexdec( substr( $hex_color, 2, 1 ) . substr( $hex_color, 2, 1 ) );
		} elseif ( strlen( $hex_color ) === 6 ) {
			$r = hexdec( substr( $hex_color, 0, 2 ) );
			$g = hexdec( substr( $hex_color, 2, 2 ) );
			$b = hexdec( substr( $hex_color, 4, 2 ) );
		} else {
			return array();
		}

		return array( $r, $g, $b );
	}
}

/* RGB to HSV.
 */
if ( ! function_exists( 'simplerei_rgb2hsv' ) ) {
	function simplerei_rgb2hsv( $rgb_color ) {
		$r = $rgb_color[0];
		$g = $rgb_color[1];
		$b = $rgb_color[2];

		$max = max( $r, $g, $b );
		$min = min( $r, $g, $b );

		if ( $max === $min ) {
			$h = 0;
		} elseif ( $b === $min ) {
			$h = ( $g - $r ) / ( $max - $min ) * 60 + 60;
		} elseif ( $r === $min ) {
			$h = ( $b - $g ) / ( $max - $min ) * 60 + 180;
		} elseif ( $g === $min ) {
			$h = ( $r - $b ) / ( $max - $min ) * 60 + 300;
		}

		if ( $max === 0 ) {
			$s = 0;
		} else {
			$s = ( $max - $min ) / $max;
		}

		$v = $max / 255;

		return array( $h, $s, $v );
	}
}

/* Convert to generate pale color.
 */
if ( ! function_exists( 'simplerei_pale_color_generator' ) ) {
	function simplerei_pale_color_generator( $hsv_color ) {
		$h = $hsv_color[0];
		$s = $hsv_color[1];
		$v = $hsv_color[2];

		// To convert the saturation and value.
		$h_ref = 0.3;

		if ( $h > 30 && $h <= 60 ) {
			$h_add = 0.0002222222 * pow( ( $h - 30 ), 2 );
		} elseif ( $h > 60 && $h <= 180 ) {
			$h_add = 0.2;
		} elseif ( $h > 180 && $h <= 210 ) {
			$h_add = 0.0002222222 * pow( ( 210 - $h ), 2 );
		} else {
			$h_add = 0;
		}

		if ( $s < 0.2 && $v > 0.9 ) {
			$s_ref = 0.375 * pow( ( 0.2 - $s ), 2 );
			$v -= $v * ( 0.05 + $s_ref ); // Decided value.
			$s += $s * 0.4; // Decided saturation.
		} else {
			if ( $v > 0.9 ) {
				$s_sub =  $s * 0.02;
				$v_add = ( 1 - $v ) * 0.3;
				$v += $v_add; // Decided value.
			} else {
				if ( $v < 0.45 ) {
					$v_ref = 0.2 + 0.4938272 * pow( ( 0.45 - $v ), 2 );
				} else {
					$v_ref = 0.2 + 0.9876543 * pow( ( $v - 0.45 ), 2 );
				}
				$s_sub =  0;
				$v_add = ( 1 - $v ) * $v_ref;

				$v += $v_add; // Decided value.
			}

			$s -= $s * ( $h_ref + $h_add );
			$s -= $s_sub; // Decided saturation.
		}

		return array( $h, $s, $v );
	}
}

/* New HSV to RGB.
 */
if ( ! function_exists( 'simplerei_hsv2rgb' ) ) {
	function simplerei_hsv2rgb( $hsv_color ) {
		$h = $hsv_color[0];
		$s = $hsv_color[1];
		$v = $hsv_color[2];

		$rgb_max = $v * 255;
		$rgb_min = $rgb_max - ( $s * $rgb_max );
		$rgb_mn = $rgb_max - $rgb_min;

		if ( $h === 360 ) {
			$h_rv = 0; // Relative value.
			$r = $rgb_max;
			$g = $rgb_min + $rgb_mn / 60 * $h_rv;
			$b = $rgb_min;
		} elseif ( $h >= 0 && $h <= 60 ) {
			$h_rv = $h;
			$r = $rgb_max;
			$g = $rgb_min + $rgb_mn / 60 * $h_rv;
			$b = $rgb_min;
		} elseif ( $h > 60 && $h <= 120 ) {
			$h_rv = $h - 60;
			$r = $rgb_max - $rgb_mn / 60 * $h_rv;
			$g = $rgb_max;
			$b = $rgb_min;
		} elseif ( $h > 120 && $h <= 180 ) {
			$h_rv = $h - 120;
			$r = $rgb_min;
			$g = $rgb_max;
			$b = $rgb_min + $rgb_mn / 60 * $h_rv;
		} elseif ( $h > 180 && $h <= 240 ) {
			$h_rv = $h - 180;
			$r = $rgb_min;
			$g = $rgb_max - $rgb_mn / 60 * $h_rv;
			$b = $rgb_max;
		} elseif ( $h > 240 && $h <= 300 ) {
			$h_rv = $h - 240;
			$r = $rgb_min + $rgb_mn / 60 * $h_rv;
			$g = $rgb_min;
			$b = $rgb_max;
		} elseif ( $h > 300 && $h < 360 ) {
			$h_rv = $h - 300;
			$r = $rgb_max;
			$g = $rgb_min;
			$b = $rgb_max - $rgb_mn / 60 * $h_rv;
		} else {
			return array();
		}

		return array( $r, $g, $b );
	}
}

/* NEW RGB to HEX.
 */
if ( ! function_exists( 'simplerei_rgb2hex' ) ) {
	function simplerei_rgb2hex( $rgb_color ) {
		$hex_color = '#';

		foreach ( $rgb_color as $value ) {
			$hex_color .= substr( '0' . dechex( round( $value ) ), -2 ); // Round off the decimal point.
		}

		return $hex_color;
	}
}

/* Increase brightness.
 */
if ( ! function_exists( 'simplerei_increase_brightness' ) ) {
	function simplerei_increase_brightness( $hsv_color ) {
		$h = $hsv_color[0];
		$s = $hsv_color[1];
		$v = $hsv_color[2];

		// To convert the value.
		if ( $v < 0.45) {
			$v_ref = 0.1 - 0.4938272 * pow( ( 0.45 - $v ), 2);
		} else {
			$v_ref = 0.1 - 0.4938272 * pow( ( $v - 0.45 ), 2);
			if ( $v_ref < 0 ) {
				$v_ref = 0;
			}
		}

		if ( $s >= 0.2 ) {
			$v -= $v * ( 0.1 + $v_ref ); // Decided value.
		} elseif ( $v <= 0.9 ) {
			$v -= $v * 0.05; // Decided value.
		}

		return array( $h, $s, $v );
	}
}

/* Correct pale color.
 */
if ( ! function_exists( 'simplerei_correct_pale_color' ) ) {
	function simplerei_correct_pale_color( $hsv_color ) {
		$h = $hsv_color[0];
		$s = $hsv_color[1];
		$v = $hsv_color[2];

		$h_ref = 0;
		$s_add = 0;
		$v_sub = 0;

		if ( $v > 0.9 ) {
			if ( $h > 40 && $h <= 60 ) {
				$h_ref = 0.000125 * pow( ( $h - 40 ), 2 );
			} elseif ( $h > 60 && $h <= 90 ) {
				$h_ref = 0.00005555556 * pow( ( 90 - $h ), 2 );
			}
			$h_ref -= ( $h_ref * 100 ) * pow( ( 1 - $v ), 2 );
		}

		if ( $v > 0.8 ) {
			if ( $s === 0 ) {
				$v_sub = 6.75 * pow( ( $v - 0.8 ), 2 );
			} elseif ( $s < 0.3 ) {
				$s_add = 0.5555556 * pow( ( 0.3 - $s ), 2 );
				$v_sub = 2.2222222 * pow( ( 0.3 - $s ), 2 );
				$v_sub -= ( $v_sub * 24 ) * pow( ( 1 - $v ), 2 );
			}
		}

		$v = $v - $h_ref - $v_sub; // Decided value.
		$s = $s + $s_add; // Decided saturation.

		return array( $h, $s, $v );
	}
}
