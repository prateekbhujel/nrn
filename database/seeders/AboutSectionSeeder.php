<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;
use App\Models\AboutSectionItem;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Mission Section ---
        $mission = AboutSection::create([
            'section_name' => 'mission',
            'title'        => 'Our Mission',
            'description'  => 'To empower communities through sustainable development initiatives, fostering economic growth, and promoting social welfare across Nepal.',
        ]);

        $missionItems = [
            ['item_title' => null, 'content' => 'Supporting local initiatives', 'icon' => null, 'order' => 0],
            ['item_title' => null, 'content' => 'Providing educational opportunities', 'icon' => null, 'order' => 1],
            ['item_title' => null, 'content' => 'Improving healthcare access', 'icon' => null, 'order' => 2],
            ['item_title' => null, 'content' => 'Promoting environmental sustainability', 'icon' => null, 'order' => 3],
        ];

        foreach ($missionItems as $item) {
            $mission->items()->create($item);
        }

        // --- Vision Section ---
        $vision = AboutSection::create([
            'section_name' => 'vision',
            'title'        => 'Our Vision',
            'description'  => 'To create a self-reliant, prosperous Nepal where every citizen has access to quality education, healthcare, and economic opportunities.',
        ]);

        $visionItems = [
            ['item_title' => null, 'content' => 'Reducing poverty through sustainable programs', 'icon' => null, 'order' => 0],
            ['item_title' => null, 'content' => 'Building resilient communities', 'icon' => null, 'order' => 1],
            ['item_title' => null, 'content' => 'Promoting gender equality', 'icon' => null, 'order' => 2],
            ['item_title' => null, 'content' => 'Preserving cultural heritage', 'icon' => null, 'order' => 3],
        ];

        foreach ($visionItems as $item) {
            $vision->items()->create($item);
        }

        // --- Core Values Section ---
        $coreValues = AboutSection::create([
            'section_name' => 'core_values',
            'title'        => 'Our Core Values',
            'description'  => 'Our core values guide our work and decision making.',
        ]);

        $coreValuesItems = [
            ['item_title' => 'Integrity', 'content' => 'Maintaining highest ethical standards in all our operations', 'icon' => '🤝', 'order' => 0],
            ['item_title' => 'Innovation', 'content' => 'Finding creative solutions to community challenges', 'icon' => '💡', 'order' => 1],
            ['item_title' => 'Sustainability', 'content' => 'Creating lasting positive impact on communities', 'icon' => '🌱', 'order' => 2],
            ['item_title' => 'Empowerment', 'content' => 'Building capacity for self-reliance', 'icon' => '🤲', 'order' => 3],
        ];

        foreach ($coreValuesItems as $item) {
            $coreValues->items()->create($item);
        }

        // --- Team Section ---
        $team = AboutSection::create([
            'section_name' => 'team',
            'title'        => 'Our Team',
            'description'  => 'Our organization is supported by a dedicated team of professionals and volunteers.',
        ]);

        $teamItems = [
            ['item_title' => 'Professional Staff', 'content' => 'Project Managers: 15, Field Officers: 30, Administrative Staff: 10, Technical Experts: 8', 'icon' => null, 'order' => 0],
            ['item_title' => 'Volunteers', 'content' => 'Community Volunteers: 200+, International Partners: 15, Technical Advisors: 20, Youth Ambassadors: 50', 'icon' => null, 'order' => 1],
        ];

        foreach ($teamItems as $item) {
            $team->items()->create($item);
        }
    }
}
