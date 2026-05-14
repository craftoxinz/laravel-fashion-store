import { Head } from '@inertiajs/react';
import Navbar from '@/components/reusable/Navbar';
// import HeroSection from "@/Components/Hero/HeroSection";

export default function Home({ name }: { name: string }) {
    return (
        <>
            {/* 1. SEO & Browser Tab Title */}
            <Head title="Home" />
            <Navbar activePage="home" />

            <main>{/* <HeroSection /> */}</main>
        </>
    );
}
